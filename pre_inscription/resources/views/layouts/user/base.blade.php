<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<!-- Site Metas -->
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="author" content=""/>
<link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pré-inscription</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://kit.fontawesome.com/d2ba3c872c.js" crossorigin="anonymous"></script>

<link href="{{asset('front/css/style.css')}}" rel="stylesheet"/>
<link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet"/>
<!-- responsive style -->
<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet"/>

<style>
    .custom-file-label::after {
        content: "Parcourir";
    }

    .travel-details {
        display: none;
    }

    .card-header {
        cursor: pointer;
    }
</style>
</head>

<body>
<header class="header_section">
    <div class="header_top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="{{ route('accueil')}}">
                        <span>
                            <img src="{{asset('front/images/LOGO-ISI.jpg')}}" width="40px" height="45px" alt="Logo-Isi"
                                 class="mr-2 rounded-circle shadow-sm"> ISI
                        </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('accueil')}} ">Accueil <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contactez-nous</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link font-weight-bold">
                                    Se connecter
                                </a>
                            </li>&ensp;
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link font-weight-bold">
                                    S&#039;inscrire
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('demande.create')}}"> Demande de Pré-inscription </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('demande.index')}}"> Suivi demande</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Profil </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                   class="list-group-item bg-primary text-white fw-bold">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Déconnexion') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>


@yield('content')

<!-- footer section -->
<footer class="container-fluid fixed-bottom footer_section">
    <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
    </p>
</footer>

<!-- footer section -->
</body>
<script>
    function submitForm() {
        document.querySelector("form").submit();
    }

    function showTravelDetails(reason) {
        document.querySelectorAll('.travel-details').forEach(function (el) {
            el.style.display = 'none';
        });
        document.getElementById(reason + 'Details').style.display = 'block';
    }

    function toggleContent(sectionId) {
        let content = document.getElementById(sectionId);
        if (content.style.display === "none" || content.style.display === "") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
    }
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zcn8zf4HPpD1cb+3shLaTeX4U6DZ0+FVh3DKBNMCA6tr4XvkqLfoJ3lD5/XUA5" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css"
      integrity="sha512-Poxt05c9bK3DB2uyI2w2Qfj+VF3z0Gsbz5z8oa9oRH1YVgQRY8LjswMOr3ev2Y4CzXr8EjgHH4j0CfEFP6pC3g=="
      crossorigin="anonymous"/>

<script src="{{asset('front/js/script.js')}}"></script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $("#statusAlert").alert('close');
        }, 10000);
    });
</script>

</html>
