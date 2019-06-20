@extends('layouts/masterGT')
@section('title')
    OPGT general
@endsection
@section('titre_page')
    ACCUEIL
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card text-white bg-dark text-center pt-2 mb-4">
                <div class="card-body card-title">
                    <h1 class="m-b-2"><i class="fa fa-cart-plus display-2"></i></h1>
                    <a href="{{route('homeGTMatIndispo')}}"><h6  class="text-light">{{$matIndispo}} matériels indisponibles</h6></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card text-white bg-primary text-center pt-2 mb-4">
                <div class="card-body card-title">
                    <h1 class="m-b-2"><i class="fa fa-calendar-alt display-2"></i></h1>
                    <a href="{{route('homeGTOTouverts')}}"><h6  class="text-light">{{$ordresOuverts}} ordres de travail ouverts</h6></a>

                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div class="col-sm-6">
            <div class="card text-white bg-success text-center py-2 mb-4">
                <div class="card-body card-title">
                    <h1 class="m-b-2"><i class="fa fa-clock display-2"></i></h1>
                    <a href="{{route('Ordres.index')}}"><h6  class="text-light">{{$ordresEnAtt}} ordres de travail en attente</h6></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card text-white bg-danger text-center py-2 mb-4">
                <div class="card-body card-title">
                    <h1 class="m-b-2"><i class="fa fa-folder-open display-2"></i></h1>
                    <a href="{{route('Dossiers.index',['operateur'=>'GT'])}}"><h6  class="text-light">{{$dossiersOuverts}} dossiers de visite ouverts</h6></a>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>


    </div>
    <!--/row-->

    @endsection
@section('footer')
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p class="text-justify text-light"> &copy; Juillet-2018</p>
                </div>
                <div class="col-sm-6 text-right text-light">
                    <p>Designed by <a href="" class="text-light">berics3@yahoo.fr</a></p>
                </div>
            </div>
        </div>
    </div>
    @endsection






