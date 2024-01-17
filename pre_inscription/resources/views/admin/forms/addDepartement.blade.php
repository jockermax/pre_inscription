@extends('layouts.admin.app')

@section('title','Ajouter Filiere')

@section('contenu')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter Département</h6>
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
                    <form method="post"
                          action="{{ route($departement->exists ? 'departement.update' : 'departement.store', $departement) }}">
                        @csrf
                        @method($departement->exists ? 'put' : 'post')
                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Nom Département</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nomDepartement"
                                       value="{{ old('nomDepartement',$departement->exists ? $departement->nomDepartement : '') }}"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            @if($departement->exists)
                                Modifier
                            @else
                                Ajouter
                            @endif
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 col-xl-8">
                <div class="bg-secondary  h-100 p-4">
                    <h6 class="mb-4">Liste des département</h6>
                    <div class="form-group">
                    </div>
                    <div class="table-responsive">
                        <table class="table text-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom Département</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departements as $departement)
                                <tr>
                                    <th scope="col">{{$departement->id}}</th>
                                    <th scope="col">{{$departement->nomDepartement}}</th>

                                    <th scope="col">
                                        <button class="btn btn-outline-warning"
                                                onclick=" window.location='{{ route('departement.edit', $departement) }}'">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('departement.destroy', $departement) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle" onclick="return confirmSuppression(event)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </th>
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
