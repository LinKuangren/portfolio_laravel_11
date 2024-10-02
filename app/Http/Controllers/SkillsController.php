<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillsRequest;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skills::paginate(3);

        return View('skills.index', [
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
        $skill = Skills::create($request->validated());

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
        $skill->update($request->validated());

        return redirect()->route('skills.index')->with('success', "La compétence a été modifier !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skill)
    {
        $skill->delete();

        return to_route('skills.index', ['skill' => $skill->id])->with('success', "La compétence a été supprimer !");
    }
}
