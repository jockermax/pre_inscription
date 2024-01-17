<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{route('admin.index')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa-solid fa-school"></i> ISI </h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="/storage/users_image/{{Auth::user()->image}}" alt=""
                     style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <span>
                    @if(Auth::user()->type == "admin")
                        Admin
                    @else
                        Personnel
                    @endif
                </span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            @if(Auth::user()->type == "admin")
                <a href="{{route('admin.index')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{route('admin.create')}}" class="nav-item nav-link"><i class="fa-solid fa-users me-2"></i>
                    Ajout Personnel</a>
                <a href="{{route('admin.liste')}}" class="nav-item nav-link"><i class="fa-solid fa-list me-2"></i> Liste
                    Personnels</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="far fa-file-alt me-2"></i>Formations</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{route('departement.index')}}" class="dropdown-item">Département</a>
                        <a href="{{route('filiere.index')}}" class="dropdown-item">Filiére</a>
                    </div>
                </div>

            @elseif(Auth::user()->type == "personnel")
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="far fa-file-alt me-2"></i>Demandes</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{route('personnel.index')}}" class="dropdown-item">Liste des demandes</a>
                        <a href="#" class="dropdown-item">Deja traiter</a>
                    </div>
                </div>

            @endif
        </div>

    </nav>
</div>
