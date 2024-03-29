<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acteur;

class ActeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acteurs = Acteur::latest()->paginate(5);
    
        return view('acteurs.index',compact('acteurs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Voornaam' => 'required',
            'Achternaam' => 'required',
        ]);
    
        Acteur::create($request->all());
     
        return redirect()->route('acteurs.index')
                        ->with('success','acteur created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $acteur = Acteur::find($id);
        
        return view('acteurs.show',compact('acteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acteur = Acteur::find($id);

        return view('acteurs.edit',compact('acteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $acteur = Acteur::find($id);
        
        $request->validate([
            'Voornaam' => 'required',
            'Achternaam' => 'required',
        ]);
    
        $acteur->update($request->all());
    
        return redirect()->route('acteurs.index')
                        ->with('success','acteur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acteur= Acteur::find($id);
        $acteur->delete();
    
        return redirect()->route('acteurs.index')
                        ->with('success','acteur deleted successfully');
    }
}
