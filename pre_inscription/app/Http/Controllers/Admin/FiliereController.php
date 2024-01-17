<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FiliereRequest;
use App\Models\Departement;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filiere = new Filiere();
        $filieres = Filiere::with('departement')->paginate(5);
        $departements = Departement::all();
        return view('admin.forms.addFiliere',compact('filieres','filiere','departements'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(FiliereRequest $request)
    {

        Filiere::create($request->validated());
        return redirect()->route('filiere.index')->with('success', 'Filiere ajouté avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        $filieres = Filiere::with('departement')->paginate(5);
        $departements = Departement::all();
        return view('admin.forms.addFiliere',compact('filieres','filiere','departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FiliereRequest $request, Filiere $filiere)
    {
        $filiere->update($request->validated());
        return redirect()->route('filiere.index')->with('success', 'Filiere modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return redirect()->route('filiere.index')->with('success', 'Filiere supprimé avec succès');
    }
}
