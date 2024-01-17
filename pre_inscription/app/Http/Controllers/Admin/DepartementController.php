<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departement = new Departement();
        $departements = Departement::paginate(5);
        return view('admin.forms.addDepartement',compact('departements','departement'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartementRequest $request)
    {
        Departement::create($request->validated());
        return redirect()->route('departement.index')->with('success', 'Departement ajouté avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        $departements = Departement::paginate(5);
        return view('admin.forms.addDepartement',compact('departements','departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartementRequest $request, Departement $departement)
    {
        $departement->update($request->validated());
        return redirect()->route('departement.index')->with('success', 'Departement modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->route('departement.index')->with('success', 'Departement supprimé avec succès');
    }
}
