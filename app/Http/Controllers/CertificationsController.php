<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificationsRequest;
use App\Models\Certifications;
use Illuminate\Http\Request;

class CertificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certifications = Certifications::paginate(3);

        return View('certifications.index', [
            'certifications' => $certifications,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $certification = new Certifications();

        return view('certifications.add', [
            'certification' => $certification,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificationsRequest $request)
    {
        $categorie = Certifications::create($request->validated());

        return redirect()->route('certifications.index')->with('sucess', "La certification a été créé !");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certifications $certification)
    {
        return view('certifications.edit', [
            'certification' => $certification,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificationsRequest $request, Certifications $certification)
    {
        $certification->update($request->validated());

        return redirect()->route('certifications.index')->with('success', "La certification a été modifier !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certifications $certification)
    {
        $certification->delete();

        return to_route('certifications.index', ['certification' => $certification->id])->with('success', "La certification a été supprimer !");
    }
}
