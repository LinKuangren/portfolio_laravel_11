<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductionsRequest;
use App\Models\Categories;
use App\Models\Productions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Productions::paginate(3);

        return view('productions.index', [
            'productions' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $production = new Productions();
        $categoriesIds = $production->categories()->pluck('id');

        return view('productions.add', [
            'production' => $production,
            'categories' => Categories::select('id', 'name')->get(),
            'categoriesIds' => $categoriesIds,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductionsRequest $request)
    {
        $production = Productions::create($this->EditImage(new Productions(), $request));
        $production->categories()->sync($request->validated('categories'));
        return redirect()->route('productions.show', ['slug' => $production->slug, 'production' => $production->id])->with('success', "la réalisation a été créé avec succes !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Productions $production): RedirectResponse | View
    {
        if($production->slug !== $slug) {
            return to_route('productions.show', ['slug' => $production->slug, 'production' => $production->id]);
        }

        return view('productions.show', [
            'production' => $production,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productions $production)
    {
        $categoriesIds = $production->categories()->pluck('id');

        return view('productions.edit', [
            'production' => $production,
            'categories' => Categories::select('id', 'name')->get(),
            'categoriesIds' => $categoriesIds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductionsRequest $request, Productions $production)
    {
        $production->update($this->EditImage($production, $request));
        $production->categories()->sync($request->validated('categories'));
        return redirect()->route('productions.show', ['slug' => $production->slug, 'production' => $production->id])->with('success', "la réalisation a été modifié !");
    }

    private function EditImage (Productions $productions, FormRequest $request): array 
    {
        $data = $request->validated();

        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null || $image->getError()) {
            return $data;
        }
        if($productions->image) {
            Storage::disk('public')->delete($productions->image);
        }

        $data['image'] = $image->store('productions', 'public');
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productions $production)
    {
        $production->delete();
        if($production->image) {
            Storage::disk('public')->delete($production->image);
        }
        $production->categories()->detach();
        return to_route('productions.index', ['id' => $production->id])->with('success', "la réalisation a été supprimer !");
    }
}
