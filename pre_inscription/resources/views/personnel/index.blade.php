@extends('layouts.admin.app')
@section('title','Liste des demandes à traiter')

@section('contenu')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary  h-100 p-4">
                    <h6 class="mb-4">@yield('title')</h6>
                    <div class="form-group">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table text-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Cliquez pour Télécharger</th>
                                <th scope="col">Status</th>
                                <th scope="col">Conclusion des autorités compétant</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($demandes as $index => $demande)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $demande->donneesPersonnelles->nom }}</td>
                                    <td>{{ $demande->donneesPersonnelles->prenom }}</td>
                                    <td>
                                        <a href="{{ route('download_dossier', $demande->id) }}" class="btn btn-primary">Télécharger</a>
                                    </td>
                                    <td><span class="btn btn-info">Traitement en cour...</span></td>
                                    <td>
                                        <!-- Bouton pour ouvrir la modale de rejet -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#rejectionModal">
                                            Rejeter la Demande
                                        </button>
                                        <!-- Bouton pour ouvrir la modale d'acceptation -->
                                        <!-- Bouton pour ouvrir la modale d'acceptation -->
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#acceptanceModal">
                                            Accepter la Demande
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal pour le rejet -->
    <div class="modal fade" id="rejectionModal" tabindex="-1" aria-labelledby="rejectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectionModalLabel">Rejet de la Demande de Visa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/send-rejection-email" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="messageRejection">Message de rejet</label>
                            <textarea class="form-control" id="messageRejection" name="message" rows="3"
                                      required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-danger">Envoyer le Rejet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal pour l'acceptation -->
    <div class="modal fade" id="acceptanceModal" tabindex="-1" aria-labelledby="acceptanceModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acceptanceModalLabel">Acceptation de la Demande de Visa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/send-acceptance-email" method="POST">
                    <div class="modal-content">
                        <div class="modal-body">
                            Voulez-vous valider la demande ? Cette action est irréversible. Veuillez bien vérifier
                            les informations fournis
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Envoyer l'Acceptation</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

