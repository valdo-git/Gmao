@extends('layouts.masterGT')

<title>Création technicien</title>

@section('titre_page')
    <legend class="card-header" > Création Technicien</legend>

@endsection

@section('sous_titre')
    <p class="text-center"> Les champs marqués(*) sont obligatoires</p>
@endsection

@section('content')

<form method="POST"  id="form-ops" action="{{ route('Techniciens.store') }}" >
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">*Grade et nom du technicien : </span>
                            </div>
                            <input type="text" class="form-control" name="grade_nom_tech" id="grade_nom_tech"  required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">*Statut du technicien : </span>
                            </div>
                            <input type="text" class="form-control" name="statut" id="statut"  required>

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Qualification : </span>
                            </div>
                            <input type="text" class="form-control" name="qualification" id="qualification">
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