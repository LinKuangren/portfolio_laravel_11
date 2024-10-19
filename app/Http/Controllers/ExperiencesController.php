<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperiencesRequest;
use App\Models\Categories;
use App\Models\Experiences;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experiences::paginate(8);

        return view('experiences.index', [
            'experiences' => $experiences,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $experience = new Experiences();
        $categoriesIds = $experience->categories()->pluck('id');

        return view('experiences.add', [
            'experience' => $experience,
            'categories' => Categories::select('id', 'name')->get(),
            'categoriesIds' => $categoriesIds,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperiencesRequest $request)
    {
        $experience = Experiences::create($this->EditImage(new Experiences(), $request));
        $experience->categories()->sync($request->validated('categories'));
        return redirect()->route('experiences.show', ['slug' => $experience->slug, 'experience' => $experience->id])->with('success', "l'experience pro a été créé avec succes !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Experiences $experience)
    {
        if($experience->slug !== $slug) {
            return to_route('experiences.show', ['slug' => $experience->slug, 'experience' => $experience->id]);
        }

        return view('experiences.show', [
            'experience' => $experience,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experiences $experience)
    {
        $categoriesIds = $experience->categories()->pluck('id');

        return view('experiences.edit', [
            'experience' => $experience,
            'categories' => Categories::select('id', 'name')->get(),
            'categoriesIds' => $categoriesIds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperiencesRequest $request, Experiences $experience)
    {
        $experience->update($this->EditImage($experience, $request));
        $experience->categories()->sync($request->validated('categories'));
        return redirect()->route('experiences.show', ['slug' => $experience->slug, 'experience' => $experience->id])->with('success', "l'expérience pro a été modifié !");
    }

    private function EditImage (Experiences $experiences, FormRequest $request): array 
    {
        $data = $request->validated();

        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null || $image->getError()) {
            return $data;
        }
        if($experiences->image) {
            Storage::disk('public')->delete($experiences->image);
        }

        $data['image'] = $image->store('experiences', 'public');
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experiences $experience)
    {
        $experience->delete();
        if($experience->image) {
            Storage::disk('public')->delete($experience->image);
        }
        $experience->categories()->detach();
        return to_route('experiences.index', ['id' => $experience->id])->with('success', "l'expérience pro a été supprimer !");
    }
}
