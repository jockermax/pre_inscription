@extends('layouts.admin.app')

@section('title','Ajouter Filiere')

@section('contenu')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="container tm-mt-big tm-mb-big">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
                                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="tm-block-title d-inline-block">Ajouter filière</h2>
                                            <div class="form-group">
                                                @if (session()->has('success'))
                                                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                @if ($errors->any())
                                                    <div class="alert alert-warning">
                                                        <ul>
                                                            <!-- Parcours les erreurs et affiches -->
                                                            @foreach ($errors->all() as $error)
                                                                <li class="text text-danger">{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row tm-edit-product-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <form method="post" class="tm-edit-product-form" action="{{ route($filiere->exists ? 'filiere.update' : 'filiere.store', $filiere) }}">
                                                @csrf
                                                @method($filiere->exists ? 'put' : 'post')
                                                <div class="form-group mb-3">
                                                    <label for="name">Nom filière
                                                    </label>
                                                    <input id="name" name="nomFiliere" type="text"
                                                           class="form-control validate"
                                                           value="{{ old('nomFiliere',$filiere->exists ? $filiere->nomFiliere : '') }}"
                                                           />
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="departement">Département</label>
                                                    <select class="custom-select tm-select-accounts" name="departement_id">
                                                        <option selected disabled>Choisir Département</option>
                                                        @foreach($departements as $departement)
                                                            <option
                                                                value="{{$departement->id}}" {{ (old('departement_id', $filiere->departement_id) == $departement->id) ? 'selected' : '' }}>{{$departement->nomDepartement}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                        <label for="cout">Coût
                                                        </label>
                                                        <input id="cout" name="cout" type="text"
                                                               class="form-control validate"
                                                               value="{{ old('cout',$filiere->exists ? $filiere->cout : '') }}"
                                                               />
                                                    </div>
                                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                        <label for="mensualite">Mensualite
                                                        </label>
                                                        <input id="mensualite" name="mensualite" type="text"
                                                               class="form-control validate"
                                                               value="{{ old('mensualite',$filiere->exists ? $filiere->mensualite : '') }}"
                                                               />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                        <label for="duree">Durée
                                                        </label>
                                                        <input id="duree" name="duree" type="text"
                                                               class="form-control validate"
                                                               value="{{ old('duree',$filiere->exists ? $filiere->duree : '') }}"
                                                               />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                                        @if($filiere->exists)
                                                            Modifier
                                                        @else
                                                            Ajouter
                                                        @endif
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-8">
                <div class="bg-secondary  h-100 p-4">
                    <h6 class="mb-4">Liste des département</h6>
                    <div class="form-group">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table text-white">
                            <thead>
                            <tr>
                                <th scope="col">Nom Filiére</th>
                                <th scope="col">Département</th>
                                <th scope="col">Coût</th>
                                <th scope="col">Mensualité</th>
                                <th scope="col">Durée</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($filieres as $filiere)
                                <tr>
                                    <td class="small">{{$filiere->nomFiliere}}</td>
                                    <td class="small">{{$filiere->departement->nomDepartement}}</td>
                                    <td class="small">{{$filiere->cout}}</td>
                                    <td class="small">{{$filiere->mensualite}}</td>
                                    <td class="small">{{$filiere->duree}} Mois</td>
                                    <td class="small">
                                        <button class="btn btn-outline-warning"
                                                onclick=" window.location='{{ route('filiere.edit', $filiere) }}'">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('filiere.destroy', $filiere) }}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle"
                                                    onclick="return confirmSuppression(event)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
    <script>
        function confirmSuppression(event) {
            event.preventDefault(); // Empêcher le formulaire de se soumettre immédiatement

            // Demander une confirmation
            if (confirm("Êtes-vous sûr de vouloir supprimer ce Département ?")) {
                event.target.form.submit(); // Soumettre le formulaire si l'utilisateur confirme
            }
        }
    </script>
    <!-- Form End -->
@endsection
