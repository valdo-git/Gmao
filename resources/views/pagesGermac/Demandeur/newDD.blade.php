@extends('layouts.masterGermac')
@section('title')
    Création d'un demandeur
@endsection
@section('content')

    <div class="card">


        <h4 class="card-header">Nouveau demandeur</h4>

        <form method="POST"  id="form-ops" action="{{ route('Demandeurs.store2') }}" >
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <p >
                                    <input type="text" class="form-control{{ $errors->has('nom_demandeur') ? ' is-invalid' : '' }}" name="nom_demandeur" id="nom_demandeur" placeholder="Nom du demandeur" required>

                                    @if ($errors->has('nom_demandeur'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nom_demandeur') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p >
                                    <input type="text" class="form-control{{ $errors->has('type_demandeur') ? ' is-invalid' : '' }}" name="type_demandeur" id="type_demandeur" placeholder="Type de demandeur"required>

                                    @if ($errors->has('type_demandeur'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('type_demandeur') }}</strong>
                                        </span>
                                    @endif
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="newop">Enregistrer</button>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </form>

    </div>
@endsection