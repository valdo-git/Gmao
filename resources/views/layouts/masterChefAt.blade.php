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
    <link rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}" />


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

            </ul>

            <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/OpGT') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user-circle" aria-hidden="true"> </i> &nbsp; {{ Auth::user()->grade }} {{ Auth::user()->name }} <span class="caret"></span>
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