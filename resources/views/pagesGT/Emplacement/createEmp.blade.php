@extends('layouts.masterGT')

<title>Création Emplacement</title>

@section('titre_page')
    <legend class="card-header" > Création Emplacement</legend>

@endsection

@section('sous_titre')
    <p class="text-center"> Les champs marqués(*) sont obligatoires</p>
@endsection

@section('content')

<form method="POST"  id="form-ops" action="{{ route('Emplacements.store') }}" >
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">*Désignation : </span>
                            </div>
                            <input type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" id="designation" required>
                            @if ($errors->has('designation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Gisement : </span>
                            </div>
                            <input type="text" class="form-control{{ $errors->has('gisement') ? ' is-invalid' : '' }}" name="gisement" id="gisement"  >
                            @if ($errors->has('gisement'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('gisement') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Observations : </span>
                            </div>
                            <textarea class="form-control{{ $errors->has('observations') ? ' is-invalid' : '' }}" name="observations" id="observations">
                            </textarea>
                            @if ($errors->has('observations'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('observations') }}</strong>
                                </span>
                            @endif
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