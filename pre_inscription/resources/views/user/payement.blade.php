@extends('layouts.user.base')

@section('content')
    <style>
        .card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }
        .payment-option {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            position: relative;
            background-color: #f9f9f9;
            text-align: center;
        }

        .payment-option img {
            max-width: 100%;
            max-height: 50px;
        }

        .bonus-tag {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .bonus-tag.red {
            background-color: #dc3545;
        }

        .payment-option:hover {
            background-color: #e9ecef;
            cursor: pointer;
        }
    </style>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                </div>
                <h2 class="text-center mb-4">Types de systèmes de paiement</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="payment-option">
                            <span class="bonus-tag">+30%</span>
                            <img src="{{asset('front/payement/wave.png')}}" alt="wave" class="img-fluid">
                            <div>Wave</div>
                            <a href="{{ route('demandes.payer', $demandeData->id) }}"
                               class="btn btn-primary btn-circle mt-2" title="Payer les frais de Dossiers">
                                PAYER
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option text-center">
                            <span class="bonus-tag red">+10%</span>
                            <img src="{{ asset('front/payement/orange_money.png') }}" alt="Om" class="img-fluid mb-2">
                            <div>OrangeMoney</div>
                            <a href="{{ route('demandes.payer', $demandeData->id) }}"
                               class="btn btn-primary btn-circle mt-2" title="Payer les frais de Dossiers">
                                PAYER
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="payment-option">
                            <!-- No bonus tag for Visa -->
                            <img src="{{asset('front/payement/wisal.png')}}" alt="Visa" class="img-fluid">
                            <div>wizall money</div>
                            <a href="{{ route('demandes.payer', $demandeData->id) }}"
                               class="btn btn-primary btn-circle mt-2" title="Payer les frais de Dossiers">
                                PAYER
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for other payment options as needed -->
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="payment-option">
                            <span class="bonus-tag">+30%</span>
                            <img src="{{asset('front/payement/Visa.png')}}" alt="wizall money" class="img-fluid">
                            <div>Visa</div>
                            <a href="{{ route('demandes.payer', $demandeData->id) }}"
                               class="btn btn-primary btn-circle mt-2" title="Payer les frais de Dossiers">
                                PAYER
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="payment-option">
                            <span class="bonus-tag red">+10%</span>
                            <img src="{{asset('front/payement/mastercart.png')}}" alt="WaveMoney" class="img-fluid">
                            <div>Mastercard</div>
                            <a href="{{ route('demandes.payer', $demandeData->id) }}"
                               class="btn btn-primary btn-circle mt-2" title="Payer les frais de Dossiers">
                                PAYER
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for other payment options as needed -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">Informations</div>
                    <div class="card-body text-black">
                        <p>Nom - Prénom : {{$donneesPersonnelles->nom}}-{{$donneesPersonnelles->prenom}} </p>
                        <p>Date naissance : {{$donneesPersonnelles->date_naissance}} </p>
                        <p>Telephone : {{$donneesPersonnelles->telephone}} </p>
                        <p>Filiere : {{$demandeData->filiere}} </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
