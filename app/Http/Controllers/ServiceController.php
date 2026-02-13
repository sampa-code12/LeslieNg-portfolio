<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('skills')->get();
        return view('services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills =  Skill::all();
        return view('services.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255|unique:services,title',
            'slug' => 'nullable|string|max:255',
            'description' => 'required|string',
            'category'=>'required|string|max:255'
        ]);

        Service::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'category'=>$request->category,
            'published_by'=>null,
            'published_at'=>now()
        ]);
        return redirect()->route('services.index')->with('message','service  cree et ajoute avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        
        $skill = Skill::with('services')->get();

        return view('services.show',compact('service', 'skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        
        $skill = Skill::all();

        return view('services.edit',compact('service', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'required|string',
            'category'=>'required|string|max:255'
        ]);

        $service->update([
            'title'=>$request->title,
            'slug'=>$request->slug ?? $request->title,
            'description'=>$request->description,
            'category'=>$request->category,
            'published_by'=>null,
            'published_at'=>$request->has('published') ? now() : null
        ]);
        
        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => "Service mis à jour avec succès!"]);
        }
        
        return redirect()->route('services.index')->with('message',"service {$service->title} mis a jour avec succes !");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('message',"service {$service->title} supprime avec succes !");
    }
}
