<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperiencesRequest;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperiencesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Experiences $experiences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experiences $experiences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperiencesRequest $request, Experiences $experiences)
    {
        //
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
    public function destroy(Experiences $experiences)
    {
        //
    }
}
