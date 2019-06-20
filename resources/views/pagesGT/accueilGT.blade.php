{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Accueil Gestion technique')

@section('content_header')
    <h1>Accueil Gestion technique</h1>
@stop

@section('content')
    <p>Bienvenue {{ Auth::user()->grade }} {{ Auth::user()->name }}.</p>
    @if ($noMaterial)
        <h4 class="text-center text-warning">Auncun matériel n'a été créé!! Veuillez en ajouter . &nbsp;  </h4>
    @else
    <!-- Small Box (Stat card) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-olive-active">
                <div class="inner">
                    <h3>{{$matIndispo}}</h3>
                    <p>{{str_plural('matériel',$matIndispo)}} {{str_plural('indisponible',$matIndispo)}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <a href="{{route('homeGTMatIndispo')}}" class="small-box-footer">
                    Plus d'infos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>{{$ordresOuverts}}</h3>
                    <p> {{str_plural('ordre',$ordresOuverts)}} {{str_plural('ouvert',$ordresOuverts)}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <a href="{{route('homeGTOTouverts')}}" class="small-box-footer">
                    Plus d'infos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-olive-active">
                <div class="inner">
                    <h3>{{$ordresEnAtt}}</h3>
                    <p> {{str_plural('ordre',$ordresEnAtt)}} en attente</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-alarm"></i>

                </div>
                <a href="{{route('Ordres.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-red-gradient">
                <div class="inner">
                    <h3>{{$dossiersOuverts}}</h3>
                    <p> {{str_plural('dossier',$dossiersOuverts)}} de visite {{str_plural('ouvert',$dossiersOuverts)}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-folder-open"></i>
                </div>
                <a href="{{route('Dossiers.index',['operateur'=>'GT'])}}" class="small-box-footer">
                    Plus d'infos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Fin Small Box (Stat card) -->


    </div>

    <!-- Apply any bg-* class to to the info-box to color it -->
    <div class="info-box bg-green ">
        <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">41,410</span>
            <!-- The progress section is optional -->
            <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    @endif


@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop