@extends('layouts.admin.app')
@section('title','Liste des Admins')

@section('contenu')
    <!-- Table Start -->
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
                                <th scope="col">Image</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <th scope="col"><img src="/storage/users_image/{{ $user->image }}" alt=""
                                                         width="70px"></th>
                                    <th scope="col">{{ $user->name }}</th>
                                    <th scope="col">{{ $user->telephone }}</th>
                                    <th scope="col">{{ $user->email }}</th>
                                    <th scope="col" class="fw-bold">
                                        @if($user->type=='admin')
                                            Admin
                                        @elseif($user->type=='personnel')
                                            Agent
                                        @endif
                                    </th>
                                    @if($user->type!=2)
                                        <th scope="col">
                                            @if ($user->status == 1)
                                                <label class="btn btn-info text-white fw-bold">En service...</label>
                                            @else
                                                <label class="btn btn-warning text-white fw-bold">Supendu</label>
                                            @endif
                                        </th>
                                        <th scope="col">
                                            @if ($user->status == 1)
                                                <button class="btn btn-outline-warning"
                                                        onclick=" window.location='{{ route('user.desactiver',[$user->id]) }}'">
                                                    Suspendre
                                                </button>
                                            @else
                                                <button class="btn btn-outline-success"
                                                        onclick=" window.location='{{ route('user.activer',[$user->id]) }}'">
                                                    Mettre en Service
                                                </button>
                                            @endif
                                            @endif
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

    <!-- Table End -->
@endsection

