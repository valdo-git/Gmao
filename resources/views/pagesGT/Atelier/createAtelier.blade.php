@extends('layouts.masterGT')

<title>Création atelier</title>

@section('titre_page')
    <legend class="card-header" > Création Atelier</legend>

@endsection

@section('sous_titre')
    <p class="text-center"> Les champs marqués(*) sont obligatoires</p>
@endsection

@section('content')



<form method="POST"  id="form-ops" action="{{ route('Ateliers.store') }}" >
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">*Nom de l'atelier : </span>
                            </div>
                            <input type="text" class="form-control{{ $errors->has('nom_atelier') ? ' is-invalid' : '' }}" name="nom_atelier" id="nom_atelier"  required>
                            @if ($errors->has('nom_atelier'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('nom_atelier') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">*Grade et nom du chef d'atelier : </span>
                            </div>
                            <select  name="nom_chef" id="nom_chef" onselect="" class="custom-select form-control" required >
                                <option>--  --</option>
                                @foreach($listeChefAt as $chef)
                                    <option value="{{$chef->grade.' '.$chef->name}}">{{$chef->grade}} {{$chef->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('nom_chef'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('nom_chef') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Date de création : </span>
                            </div>
                            <input type="date" class="form-control" name="date_creation" id="date_creation">


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="newop">Enregistrer</button>
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
    </div>
</form>


    @endsection