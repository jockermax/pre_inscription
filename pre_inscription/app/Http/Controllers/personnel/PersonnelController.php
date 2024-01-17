<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::with('donneesPersonnelles', 'seconde','premiere','terminal','baccalaureat')
            ->get();

        foreach ($demandes as $demande) {
            $donneesPersonnelles = $demande->donneesPersonnelles;
            // Utiliser le chemin de stockage enregistré dans la table demande
            $storagePath = storage_path("app/public/{$demande->storagePath}");

            // Assurez-vous que le dossier existe
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0777, true);
            }

            // Génération du fichier texte avec les informations
            $infoText = "\nInformations Personnelles:\n";
            $infoText .= "Nom: " . $donneesPersonnelles->nom . "\n";
            $infoText .= "Prénom: " . $donneesPersonnelles->prenom . "\n";
            $infoText .= "E-mail: " . $donneesPersonnelles->email . "\n";
            $infoText .= "Sexe: " . $donneesPersonnelles->sexe. "\n";
            $infoText .= "Telephone: " . $donneesPersonnelles->telephone . "\n";
            $infoText .= "Date naisssance: " . $donneesPersonnelles->date_naissance . "\n";
            $infoText .= "Ville naisssance: " . $donneesPersonnelles->ville_naissance . "\n";
            $infoText .= "Pays Residence: " . $donneesPersonnelles->pays_residence. "\n";
            $infoText .= "Status Légal: " . $donneesPersonnelles->status_legal . "\n";
            $infoText .= "Langue maternelle: " . $donneesPersonnelles->langue_maternelle . "\n";
            $infoText .= "Langue parlée: " . $donneesPersonnelles->langue_parlee . "\n";



            $infoText .= "\nInformations Etudes anterieur et baccalaureat:\n";
            $infoText .= "\nClasse de seconde\n";
            $infoText .= "\nPays Etude: " . $demande->seconde->paysEtudeSeconde . "\n";
            $infoText .= "Ville d'étude: " . $demande->seconde->villeEtude . "\n";
            $infoText .= "etablissement: " . $demande->seconde->etablissement . "\n";
            $infoText .= "Nom du programme: " . $demande->seconde->programme . "\n";
            $infoText .= "Date de début: " . $demande->seconde->date_debut . "\n";
            $infoText .= "Date de Fin: " . $demande->seconde->date_fin . "\n";

            $infoText .= "\nClasse de Premiere\n";
            $infoText .= "\nPays Etude: " . $demande->premiere->paysEtudePremiere . "\n";
            $infoText .= "Ville d'étude: " . $demande->premiere->villeEtude . "\n";
            $infoText .= "etablissement: " . $demande->premiere->etablissement . "\n";
            $infoText .= "Nom du programme: " . $demande->premiere->programme . "\n";
            $infoText .= "Date de début: " . $demande->premiere->date_debut . "\n";
            $infoText .= "Date de Fin:  " . $demande->premiere->date_fin . "\n";

            $infoText .= "\nClasse de Terminal\n";
            $infoText .= "\nPays Etude: " . $demande->terminal->paysEtudeTerminal . "\n";
            $infoText .= "Ville d'étude: " . $demande->terminal->villeEtude . "\n";
            $infoText .= "etablissement: " . $demande->terminal->etablissement . "\n";
            $infoText .= "Nom du programme: " . $demande->terminal->programme . "\n";
            $infoText .= "Date de début: " . $demande->terminal->date_debut . "\n";
            $infoText .= "Date de Fin: " . $demande->terminal->date_fin . "\n";

            $infoText .= "\nBaccalaurats\n";
            $infoText .= "\nPays Etude: " . $demande->baccalaureat->paysEtudePremiere . "\n";
            $infoText .= "Ville d'étude: " . $demande->baccalaureat->villeEtude . "\n";
            $infoText .= "etablissement: " . $demande->baccalaureat->etablissement . "\n";
            $infoText .= "Nom du programme: " . $demande->baccalaureat->programme . "\n";
            $infoText .= "Date de début: " . $demande->baccalaureat->date_debut . "\n";
            $infoText .= "Date de Fin: " . $demande->baccalaureat->date_fin . "\n";


            $filePath = $storagePath . '/informations.txt';
            file_put_contents($filePath, $infoText);

            // Création du fichier ZIP
            $zip = new \ZipArchive();
            $zipFileName = $storagePath . '/dossier_complet.zip';

            if ($zip->open($zipFileName, \ZipArchive::CREATE) === TRUE) {
                // Ajouter le fichier texte
                $zip->addFile($filePath, 'informations.txt');

                // Ajouter des fichiers dans le dossier ZIp
                $secondeFilePath = $storagePath . '/seconde/bultin_seconde.pdf';
                if (file_exists($secondeFilePath)) {
                    $zip->addFile($secondeFilePath, 'bultin_seconde.pdf');
                }

                $premiereFilePath = $storagePath . '/premiere/bultin_premiere.pdf';
                if (file_exists($premiereFilePath)) {
                    $zip->addFile($premiereFilePath, 'bultin_premiere.pdf');
                }

                $terminalFilePath = $storagePath . '/terminal/bultin_terminal.pdf';
                if (file_exists($terminalFilePath )) {
                    $zip->addFile($terminalFilePath , 'bultin_terminal.pdf');
                }

                // Ajouter les fichiers du BAC
                $diplomeFilePath = $storagePath . '/diplome/diplome_bac.pdf';
                if (file_exists($diplomeFilePath )) {
                    $zip->addFile($diplomeFilePath , 'diplome_bac.pdf');
                }

                $releverFilePath = $storagePath . '/relever/relever_de_note.pdf';
                if (file_exists($releverFilePath )) {
                    $zip->addFile($releverFilePath , 'relever_de_note.pdf');
                }


                $zip->close();
            }
        }

        return view('personnel.index', compact('demandes'));
    }

    public function downloadDossier($id) {
        // Trouver la demande par son ID
        $demande = Demande::findOrFail($id);

        // Construire le nom du dossier basé sur des informations spécifiques
        $donneesPersonnelles = $demande->donneesPersonnelles;
        $dossierNom = $donneesPersonnelles->nom . '_' . $donneesPersonnelles->prenom . '_' . $demande->id;

        // Chemin vers le fichier ZIP dans le storage
        $filePath = storage_path("app/public/{$demande->storagePath}/dossier_complet.zip");

        Log::info("Tentative de téléchargement du fichier ZIP: " . $filePath);

        // Vérifier si le fichier existe et le retourner pour téléchargement
        if (file_exists($filePath)) {
            Log::info("Fichier ZIP trouvé, préparation pour le téléchargement.");
            return response()->download($filePath);
        } else {
            // Si le fichier n'existe pas, rediriger avec un message d'erreur
            Log::error("Fichier ZIP non trouvé.");
            return back()->with('error', 'Fichier ZIP non trouvé.');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
}
