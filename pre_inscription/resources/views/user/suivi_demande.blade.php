@extends('layouts.user.base')

@section('content')
    <div class="container mt-5">
        <div class="text-center p-3 mb-4"
             style="background-color: #093a6f; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
            <img src="{{asset('front/images/LOGO-ISI.jpg')}}" width="70px" height="70px" alt="isi"
                 class="mr-2 rounded-circle shadow-sm">
            <span class="text-white h2">Suivi des demandes</span>
            <img src="{{asset('front/images/LOGO-ISI.jpg')}}" width="70px" height="70px" alt="isi"
                 class="ml-2 rounded-circle shadow-sm">
        </div>


        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>N° de demande</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Filiére</th>
                <th>Date de demande</th>
                <th>État de la demande</th>
                <th>Action</th>
                <th>Motif du rejet</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($demandes as $demandeData)
                    <td>{{$demandeData->id}}</td>
                    <td>{{$demandeData->donneesPersonnelles->nom}}</td>
                    <td>{{$demandeData->donneesPersonnelles->prenom}}</td>
                    <td>{{$demandeData->filiere}}</td>
                    <td>{{$demandeData->created_at}}</td>
                    <td>
                        @if(!$demandeData->statusPayement)
                            <span class="badge badge-warning">EN ATTENTE PAYEMENT</span>
                        @else
                            @if(!$demandeData->statusDemande)
                                <span class="badge badge-info">TRAITEMENT EN COURS...</span>
                            @else

                            @endif
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('demande.destroy', $demandeData) }}" method="POST"
                              style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-circle" title="Annuler la demande"
                                    onclick="return confirmSuppression(event)">
                                <i class="fa-sharp fa-solid fa-ban"></i>
                            </button>
                        </form>
                        @if(!$demandeData->statusPayement)
                            <a href="{{ route('demandes.payement', $demandeData->id) }}"
                               class="btn btn-info btn-circle" title="Payement">
                                <i class="fa-solid fa-money-bill-transfer"></i>
                            </a>
                        @endif
                    </td>
                    <td>

                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="motifModal" tabindex="-1" role="dialog" aria-labelledby="motifModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="motifModalLabel">Motif du rejet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Le motif du rejet sera affiché ici.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
