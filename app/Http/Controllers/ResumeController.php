<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = Resume::all();
        return view('resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resumes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:education,experience,skill',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'institution_company' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'percentage' => 'nullable|integer|min:0|max:100',
        ]);

        Resume::create($request->all());
        return redirect()->route('resumes.index')->with('message', 'Élément du résumé créé avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        return view('resumes.edit', compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        $request->validate([
            'type' => 'required|in:education,experience,skill',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'institution_company' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'percentage' => 'nullable|integer|min:0|max:100',
        ]);

        $resume->update($request->all());
        return redirect()->route('resumes.index')->with('message', 'Élément du résumé mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('resumes.index')->with('message', 'Élément du résumé supprimé avec succès !');
    }
}
