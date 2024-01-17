@extends('layouts.app')

@section('content')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{asset('assetsLogin/images/signin-image.jpg')}}" alt="sing up image"></figure>
                    <a href="{{ route('register') }}" class="signup-image-link">Créer un compte</a>
                    <a href="{{ url('/') }}" class="signup-image-link">Retour vers Accueil</a>
                </div>

                <div class="signin-form">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2 class="form-title">Se connecter</h2>
                    <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="your_name" placeholder="E-mail"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="your_pass" placeholder="Password"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember" class="agree-term" {{ old('remember') ? 'checked' : '' }} />
                            <label for="remember" class="label-agree-term"><span><span></span></span>Se souvenir de moi</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Connecter"/>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>

                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
