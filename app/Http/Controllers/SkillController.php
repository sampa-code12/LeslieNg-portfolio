<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Service;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skill = Skill::with('services')->get();
        return view('skills.index',compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service =  Service::all();
        return view('skills.create',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'level'=>'nullable|string|max 10',
            'category'=>'required|string|max:255',
        ]);

        Skill::create([
            'name'=>$request->name,
            'level'=>$request->level,
            'category'=>$request->category,
            'published_at'=>now(),
        ]);
        
        return redirect()->route('skills.index')->with('message','competence cree et ajoute avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        
        $service = Service::with('skills')->get();

        return view('skills.show',compact('skill','service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
       
        $services =  Service::all();
        return view('skills.edit',compact('skill','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'level'=>'nullable|string|max 10',
            'category'=>'required|string|max:255',
        ]);

        
        $skill->update([
            'name'=>$request->name,
            'level'=>$request->level,
            'category'=>$request->category,
            'published_at'=>now(),
        ]);
        
        return redirect()->route('skills.index')->with('message',"competence {$skill->name} mise avec succes avec succes !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        
        $skill->delete();
        return redirect()->route('skills.index')->with('message',"competence supprime avec succes");
    }
}
