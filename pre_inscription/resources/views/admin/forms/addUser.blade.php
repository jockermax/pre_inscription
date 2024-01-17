@extends('layouts.admin.app')

@section('title','Ajouter Personnel')

@section('contenu')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-12 col-lg-5  col-xl-7">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{route('admin.index')}}" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>ISI</h3>
                            </a>
                            <h3>Personnel</h3>
                        </div>
                        @if (session()->has('info'))
                            <div class="alert alert-success">{{ session()->get('info') }}</div>
                        @endif
                        <div class="row mb-3">
                            <div class="custom-file mt-3 mb-3 text-center">
                                @if($user->exists)
                                    <img id="productImage" class="rounded-circle w-25"
                                         src="/storage/users_image/{{ Auth::user()->image }}"
                                         alt="Product Image"
                                         class="img-fluid"/>
                                @else
                                    <img id="productImage" class="rounded-circle w-25"
                                         src="/storage/users_image/noImage.jpg"
                                         alt="Product Image"
                                         class="img-fluid"/>
                                @endif
                                <br><br>

                                <input type="button" class="btn btn-primary btn-block mx-auto"
                                       value="Télécharger une image"
                                       onclick="document.getElementById('fileInput').click();"/>
                            </div>
                        </div>
                        <form method="POST"
                              action="{{ route($user->exists ? 'profil.update' : 'admin.store', $user) }} "
                              class="signin-form" enctype="multipart/form-data">
                            @csrf
                            @method($user->exists ? 'put' : 'post')
                            <!-- Ligne pour Nom et Prénom -->
                            <input id="fileInput" name="image" type="file" style="display:none;"
                                   onchange="previewImage(event)"/>
                            <div class="row mb-3">
                                <!-- Champ Nom -->
                                <div class="col-md-12  form-group">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           value="{{ old('name', $user->name) }}" required autocomplete="nom" autofocus
                                           placeholder="Prénom & Nom">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Ligne pour Téléphone et Adresse E-mail -->
                            <div class="row mb-3">
                                <!-- Champ Téléphone -->
                                <div class="col-md-6 form-group">
                                    <input id="telephone" type="text"
                                           class="form-control @error('telephone') is-invalid @enderror"
                                           name="telephone" value="{{ old('telephone',$user->telephone) }}" required
                                           autocomplete="telephone" autofocus
                                           placeholder="Téléphone">
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <select class="form-select mt-0" aria-label="Default select example" name="type">
                                        <option selected disabled>Choisir profil</option>
                                        <option
                                            value="0" {{ (old('type', $user->type) == 'admin') ? 'selected' : '' }} {{ Auth::user()->email !=='sowpharell98@hotmail.com'? 'disabled' :'' }}>
                                            Admin
                                        </option>
                                        <option
                                            value="1" {{ (old('type', $user->type) == 'personnel') ? 'selected' : '' }} {{ Auth::user()->email !=='sowpharell98@hotmail.com'? 'disabled' :'' }}>
                                            Agent
                                        </option>
                                    </select>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <!-- Champ Nom -->
                                    <div class="col-md-12  form-group">
                                        <input id="email" type="text"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ old('email', $user->email) }}"
                                               {{ $user->exists ? 'disabled' : '' }} required autocomplete="email"
                                               autofocus
                                               placeholder="E-mail">
                                        @error('email')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block">
                                    @if($user->exists)
                                        Modifier
                                    @else
                                        Ajouter
                                    @endif
                                </button>
                            </div>
                        </form>
                        <!-- Ligne pour Mot de Passe et Confirmation -->
                        <br><br>
                        @if($user->exists)
                            <div class="d-flex align-items-center justify-content-between mb-3">

                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Changer de mots de passe
                                </h3>


                            </div>

                            <form action="{{ route('user.updatePass', Auth::user()->id)}}" method="post"
                                  class="signin-form">
                                @csrf

                                <div class="row mb-3">
                                    <!-- Champ Mot de Passe -->
                                    <div class="col-md-6 form-group">
                                        @if (session()->has('error'))
                                            <div class="alert alert-warning">{{ session()->get('error') }}</div>
                                        @endif
                                        @if (session()->has('success'))
                                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                                        @endif
                                        <input type="password"
                                               class="form-control @error('old_password') is-invalid @enderror"
                                               name="old_password" required autocomplete="new-password"
                                               placeholder="Ancien password">
                                        @error('old_password')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <!-- Champ Mot de Passe -->
                                    <div class="col-md-6 form-group">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password"
                                               placeholder="Nouveau mots de passe">
                                        @error('password')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Champ Confirmation du Mot de Passe -->
                                    <div class="col-md-6 form-group mb-3">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation"
                                               required autocomplete="new-password"
                                               placeholder="Confirmer le mot de passe">
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Bouton d'inscription -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <!-- Sign Up End -->
        @endsection
        @section('scripts')
            <script>
                function previewImage(event) {
                    var input = event.target;
                    var imageElement = document.getElementById('productImage');

                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            imageElement.src = e.target.result;
                        }

                        reader.readAsDataURL(input.files[0]);
                    } else {
                        imageElement.src = "NoImage.jpg";
                    }
                }
            </script>

@endsection
