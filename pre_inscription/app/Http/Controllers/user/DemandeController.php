<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaccalaureatRequest;
use App\Http\Requests\DemandeRequest;
use App\Http\Requests\DonneesPersonnellesRequest;
use App\Http\Requests\PremiereRequest;
use App\Http\Requests\secondeRequest;
use App\Http\Requests\TerminalRequest;
use App\Models\Baccalaureat;
use App\Models\Demande;
use App\Models\DonneesPersonnelles;
use App\Models\Filiere;
use App\Models\Premiere;
use App\Models\Seconde;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les demandes de visa de l'utilisateur actuel avec les données personnelles liées
        $demandes = Demande::where('users_id', Auth::user()->id)
            ->with('donneesPersonnelles')
            ->get();

        return view('user.suivi_demande', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Filiere::with('departement')->get();
        return view('user.demande', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Fusionner les règles de validation
        $donnesPersonnelsRules = (new DonneesPersonnellesRequest())->rules();
        $secondeRules = (new secondeRequest())->rules();
        $permiereRules = (new PremiereRequest())->rules();
        $terminalRules = (new TerminalRequest())->rules();
        $baccalaureatRules = (new BaccalaureatRequest())->rules();
        $demandeRules = (new DemandeRequest())->rules();
        // Valider les données
        $validatedData = $request->validate(array_merge(
            $donnesPersonnelsRules,
            $secondeRules,
            $permiereRules,
            $terminalRules,
            $baccalaureatRules,
            $demandeRules,
        ));

        // Générer un nom de dossier unique basé sur les données personnelles
        $dossierNom = $validatedData['nom'] . '_' . $validatedData['prenom'] . '_' . time();

        // Traitement et stockage des fichiers spécifiques à la demande

        //Seconde
        $secondeFilePath = $request->hasFile('BultinSeconde') ?
            $request->file('BultinSeconde')->storeAs(
                "{$dossierNom}/seconde",
                'bultin_seconde.' . $request->file('BultinSeconde')->getClientOriginalExtension(),
                'public'
            ) : null;
        //Premiere
        $premiereFilePath = $request->hasFile('BultinPremiere') ?
            $request->file('BultinPremiere')->storeAs(
                "{$dossierNom}/premiere",
                'bultin_premiere.' . $request->file('BultinPremiere')->getClientOriginalExtension(),
                'public'
            ) : null;

        //Terminal
        $terminalFilePath = $request->hasFile('BultinTerminal') ?
            $request->file('BultinTerminal')->storeAs(
                "{$dossierNom}/terminal",
                'bultin_terminal.' . $request->file('BultinTerminal')->getClientOriginalExtension(),
                'public'
            ) : null;


        //baccalaureat
        $releverFilePath = $request->hasFile('relever') ?
            $request->file('relever')->storeAs(
                "{$dossierNom}/relever",
                'relever_de_note.' . $request->file('relever')->getClientOriginalExtension(),
                'public'
            ) : null;

        $diplomeFilePath = $request->hasFile('diplome') ?
            $request->file('diplome')->storeAs(
                "{$dossierNom}/diplome",
                'diplome_bac.' . $request->file('diplome')->getClientOriginalExtension(),
                'public'
            ) : null;

        //Creer la demande de pre_incription
        $demandeData = Demande::create([
            'users_id' => Auth::user()->id,
            'filiere' => $validatedData['filiere'],
            'niveau_a_integrer' => $validatedData['niveau_a_integrer'],
            'storagePath' => $dossierNom,
        ]);


        // Ajout des chemins dans $validatedData
        $validatedData['BultinSeconde'] = $secondeFilePath;
        $validatedData['BultinPremiere'] =$premiereFilePath ;
        $validatedData['BultinTerminal'] = $terminalFilePath;
        $validatedData['relever'] =$releverFilePath ;
        $validatedData['diplome'] =$diplomeFilePath ;
        // Ajout l'ID de la demande dans $validatedData
        $validatedData['demande_id'] = $demandeData->id;


        // Création de l'entrée dans les different table
        $donneesPersonnelles=DonneesPersonnelles::create($validatedData);
         Seconde::create($validatedData);
         Premiere::create($validatedData);
         Terminal::create($validatedData);
         Baccalaureat::create($validatedData);


       return view('user.payement', compact('donneesPersonnelles','demandeData'))->with('success', 'Demande de visa envoyée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function payement(string $id)
    {
        $demandeData = Demande::findOrFail($id);
        $donneesPersonnelles = $demandeData->DonneesPersonnelles;

        return view('user.payement', compact('donneesPersonnelles','demandeData'));
    }

    public function payer(string $id)
    {
        $demande = Demande::findOrFail($id);
        $demande->statusPayement = 1;
        $demande->update();
        // Récupérer toutes les demandes de pre_inscription de l'utilisateur actuel avec les données personnelles liées
        $demandes = Demande::where('users_id', Auth::user()->id)
            ->with('donneesPersonnelles')
            ->get();
        return view('user.suivi_demande', compact('demandes'));
    }


}
