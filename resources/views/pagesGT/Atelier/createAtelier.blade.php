@extends('adminlte::page')

@section('title', 'Créer atélier')

@section('content_header')
    <h3 class="box-title">Créer Atélier</h3>
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Créer atélier</li>
    </ol>
    @stop

@section('titre_page')
    <legend class="card-header" > Création Atelier</legend>

@endsection

@section('sous_titre')
    <p class="text-center"> Les champs marqués(*) sont obligatoires</p>
@endsection

@section('content')

    <div class="box box-solid box-body">

        <form class="form-horizontal" method="POST" action="{{ route('Ateliers.store') }}" accept-charset="UTF-8">
            {!! csrf_field() !!}    

            <div class="form-group">
                <label class="col-sm-4 text-right control-label col-form-label" >*Nom atélier:  </label>
                <div class="col-sm-4">
                    <input class="form-control{{ $errors->has('nom_atelier') ? ' is-invalid' : '' }}" name="nom_atelier" type="text" id="nom_atelier" required>
                    @if ($errors->has('nom_atelier'))
                        <span class="invalid-feedback bg-danger">
                            <strong>{{ $errors->first('') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

                <div class="form-group">
                    <label class="col-sm-4 text-right control-label col-form-label" >*Grade et nom du chef d'atelier :  </label>
                    <div class="col-sm-4">
                        <input class="form-control" name="nom_chef" type="text" id="nom_chef" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 text-right control-label col-form-label" >Date de création:  </label>
                    <div class="col-sm-4">
                        <input class="form-control" name="date_creation" type="date" id="date_creation" required>
                    </div>
                </div>

                <div class="card-footer col-sm-8">
                    <button class="btn btn-primary pull-right " type="submit" ><i class="fa fa-check-circle-o"></i>&nbsp; Valider l'enregistrement</button>
                    <button class="btn" type="reset" ><i class="fa fa-reddit"></i>&nbsp; Annuler l'enregistrement</button>
                </div>


        </form>
                        
    </div>

@endsection