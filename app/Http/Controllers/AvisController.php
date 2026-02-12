<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avis = Avis::all();
        return view('avis.index',compact('avis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message'=>'required|string|max:500',
        ]);

        Avis::create([
            'message'=>$request->message,
            'published_at'=>now(),
        ]);

        return redirect()->route('avis.index')->with('message','votre a  ete avis envoye avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Avis $avis)
    {
        return view('avis.show',compact('avis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avis $avis)
    {
        $timeForEdit=now()->diffInMinutes($avis->published_at);
        if($timeForEdit > 60 ){
            return redirect()->route('avis.index')->with('error','temps de modification ecoule !');
        }
        return view('avis.edit',compact('avis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avis $avis)
    {
        $timeForUpdate = now()->diffInMinutes($avis->published_at);
        if($timeForUpdate > 60){
            return redirect()->route('avis.index')->with('error','delai expire');
        }

        $request->validate([
        'message' => 'required|string|max:500',
    ]);
    
    $avis->update(['message' => $request->message,'published_at'=>now()]);
    
    return redirect()->route('avis.index')
        ->with('message', 'Avis modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avis $avis)
    {
        $timeForUpdate = now()->diffInMinutes($avis->published_at);
        if($timeForUpdate > 60){
            return redirect()->route('avis.index')->with('error','delai expire ! vous ne pouvez supprimmer cet avis');
        }

        $avis->delete();
        return redirect()->route('avis.index')->with('message','Avis supprime');
    }
}
