@extends('layouts.app')

@section('content')
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">S'inscrire</h2>
                    <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name"class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Votre nom"/>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Votre Email"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="Password"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="password-confirm" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>J'accepte toutes les déclarations des conditions d'utilisation <a href="#" class="term-service">conditions d'utilisation
                                </a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit"  id="signup" class="form-submit" value="S'inscrire"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('assetsLogin/images/signup-image.jpg')}}" alt="sing up image"></figure>
                    <a href="{{ route('login') }}" class="signup-image-link">je suis déjà membre</a>
                    <a href="{{ url('/') }}" class="signup-image-link">Retour vers Accueil</a>
                </div>
            </div>
        </div>
    </section>
@endsection
