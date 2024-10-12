<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillsRequest;
use App\Models\Skills;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skills::paginate(9);

        return view('skills.index', [
            'skills' => $skills,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skill = new Skills();

        return view('skills.add', [
            'skill' => $skill,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillsRequest $request)
    {
        $skill = Skills::create($this->EditImage(new Skills(), $request));

        return redirect()->route('skills.index')->with('sucess', "La compétence a été créé !");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skills $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillsRequest $request, Skills $skill)
    {
        $skill->update($this->EditImage($skill, $request));

        return redirect()->route('skills.index')->with('success', "La compétence a été modifier !");
    }

    private function EditImage (Skills $skills, FormRequest $request): array 
    {
        $data = $request->validated();

        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null || $image->getError()) {
            return $data;
        }
        if($skills->image) {
            Storage::disk('public')->delete($skills->image);
        }

        $data['image'] = $image->store('skills', 'public');
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skill)
    {
        $skill->delete();
        if($skill->image) {
            Storage::disk('public')->delete($skill->image);
        }

        return to_route('skills.index', ['skill' => $skill->id])->with('success', "La compétence a été supprimer !");
    }
}
