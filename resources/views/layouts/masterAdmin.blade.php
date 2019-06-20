<!-- master.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="crsf-token" content="{{csrf_token()}}"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/monfichier.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-4/css/bootstrap.css')}}" />

    <link rel="stylesheet" href="{{asset('css/fontawesome-5.2.0/css/all.css')}}" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- Personnal stylesheets -->
    @yield('stylesheets')
</head>
<body style="background: #e9ecef url('') 0 0 no-repeat;">


<main id="wrapper" role="main" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-primary ">
        <span class="navbar-toggler-icon leftmenutrigger"></span>
        &nbsp;
        <img src="{{asset('/logoNew1.png')}}" alt="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav animate side-nav">

                <li class="nav-item">
                    <a href="#demo" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp;
                        Utilisateurs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo">
                        <a href="{{ route('register') }}" class="nav-link">Enregistrer nouveau</a>
                        <a href="{{ route('User.index') }}" class="nav-link">Consulter la liste </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp;
                        Ateliers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo">
                        <a href="{{ route('Ateliers.create') }}" class="nav-link">Enregistrer nouveau</a>
                        <a href="{{ route('Ateliers.index') }}" class="nav-link">Consulter la liste </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo12" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp;
                        Emplacements &nbsp;&nbsp;
                        <i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo12">
                        <a href="{{ route('Emplacements.create') }}" class="nav-link">Enregistrer nouveau</a>
                        <a href="{{ route('Emplacements.index') }}" class="nav-link">Consulter la liste </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo1" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp;
                        Matériels &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo1">
                        <a href="{{ route('Materiels.create') }}" class="nav-link">Enregistrer nouveau</a>
                        <a href="{{ route('Materiels.index') }}" class="nav-link">Consulter la liste</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo2" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp; Ordres de travail &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo2">
                        <a href="{{ route('Ordres.selectMat') }}" class="nav-link">Créer Nouveau</a>
                        <a href="{{ route('Ordres.index') }}" class="nav-link">Lister les OT en attente</a>
                        <a href="{{ route('Ordres.index') }}" class="nav-link">Consulter la due list</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo3" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;Dossiers de visite &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo3">
                        <a href="{{ route('Dossiers.create') }}" class="nav-link">Lancer un DV</a>
                        <a href="{{ route('Materiels.index') }}" class="nav-link">Consulter les DV</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo1" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp;
                        Exploitations &nbsp;
                        <i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo1">
                        <a href="{{ route('Exploitaions.selectMat',['action'=>'create']) }}" class="nav-link">Enregistrer nouveau</a>
                        <a href="{{ route('Exploitaions.selectMat',['action'=>'search']) }}" class="nav-link">Consulter la liste</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo11" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp;
                        Infos Matériels &nbsp;
                        <i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo11">
                        <a href="{{ route('Exploitaions.selectMat',['action'=>'create']) }}" class="nav-link">Modifier informations</a>
                        <a href="{{ route('Materiels.index2') }}" class="nav-link">Consulter liste matériel</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo2" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp; Demandeurs &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo2">
                        <a href="{{ route('Demandeurs.create') }}" class="nav-link">Enregistrer Nouveau</a>
                        <a href="{{ route('Demandeurs.index') }}" class="nav-link">Liste demandeurs</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo21" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp; Maintenances &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo21">
                        <a href="{{ route('Dossiers.index',['operateur'=>'Germac']) }}" class="nav-link">Liste dossiers de visite </a>
                        <a href="{{ route('Ordres.selectMat') }}" class="nav-link">Liste ordres de travail</a>
                        <a href="{{ route('Ordres.selectMat') }}" class="nav-link">Liste cartes de travail</a>

                    </div>
                </li>

                <li class="nav-item">
                    <a href="#demo3" class="nav-link" data-toggle="collapse" data-parent="#MainMenu">
                        <i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;Les pannes &nbsp;<i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="demo3">
                        <a href="{{ route('Dossiers.create') }}" class="nav-link">Nouvelle panne</a>
                        <a href="{{ route('Materiels.index') }}" class="nav-link">Liste pannes</a>
                        <a href="{{ route('Materiels.index') }}" class="nav-link">Nouveau ordre réparation</a>
                        <a href="{{ route('Materiels.index') }}" class="nav-link">Liste ordres réparation</a>
                    </div>
                </li>

            </ul>

            <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homeAdmin') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user-circle" aria-hidden="true"> </i> &nbsp; CNE {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card" style="background-color: transparent ">
                    <div class="card-body">

                        <h5 class="card-title">@yield('titre_page')</h5>
                        <h6 class="card-subtitle mb-2 text-muted">@yield('sous_titre')</h6>
                        <p class="card-text">@yield('text')</p>

                        @if (session()->has('notification.message'))
                            <div class="alert alert-{{ session()->get('notification.type')}} ">
                                {{ session()->get('notification.message') }}
                            </div>
                        @endif

                        @yield('content')
                        @yield('form')

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>



<script src="//code.jquery.com/jquery.js"></script>
@include('flashy::message')
<script type="text/javascript" src="{{asset('js/monfichier.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/larails.js')}}"></script>
@yield('scripts')

@yield('footer')
</body>
</html>