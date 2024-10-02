<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Categories::paginate(3);

        return View('categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = new Categories();

        return view('categories.add', [
            'categorie' => $categorie,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        $categorie = Categories::create($request->validated());

        return redirect()->route('categories.index')->with('sucess', "La catégorie a été créé !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categorie)
    {
        return view('categories.edit', [
            'categorie' => $categorie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, Categories $categorie)
    {
        $categorie->update($request->validated());

        return redirect()->route('categories.index')->with('success', "La catégorie a été modifier !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categorie)
    {
        $categorie->delete();

        return to_route('categories.index', ['categorie' => $categorie->id])->with('success', "La categorie a été supprimer !");
    }
}
