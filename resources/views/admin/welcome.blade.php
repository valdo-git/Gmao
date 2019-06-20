@extends('layouts/masterAdmin')
@section('title')
    Admin
@endsection
@section('titre_page')
    -- Bienvenu dans la page d'accueil des administrateurs--
@endsection
@section('sous_titre')

@endsection

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card border-primary " >
                <div class="card-header">
                    <i class="fa fa-truck fa-lg " aria-hidden="true"></i>&nbsp;
                    Nombre d'utilisateurs  &nbsp;
                    <span class="badge badge-danger"></span>
                </div>
                <div class="card-body text-primary">
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('Materiels.index') }}">
                        Voir les détails&nbsp;
                        <i class="fa fa-arrow-circle-right fa-lg" aria-hidden="true"></i>
                    </a>
                </div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-primary" >
                <div class="card-header">
                    <i class="fa fa-cart-plus fa-lg " aria-hidden="true"></i>&nbsp;
                    Ordres de réparetions émis &nbsp;
                    <span class="badge badge-danger">2</span>
                </div>

                <div class="card-body text-primary">
                    <h5 class="card-title">2 Ordres de réparations ouverts</h5>
                    <p class="card-text"></p>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('Materiels.index') }}">
                        Voir les détails&nbsp;
                        <i class="fa fa-arrow-circle-right fa-lg" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-primary ">
                <div class="card-header">
                    <i class="fa fa-folder-open fa-lg " aria-hidden="true"></i>&nbsp;
                    Dossiers de visite ouverts
                    &nbsp;
                    <span class="badge badge-danger">2</span>
                </div>
                <div class="card-body text-primary">
                    <h5 class="card-title">2 Dossiers de visite ouverts</h5>
                    <p class="card-text"></p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('Materiels.index') }}">
                        Voir les détails&nbsp;
                        <i class="fa fa-arrow-circle-right fa-lg" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

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






