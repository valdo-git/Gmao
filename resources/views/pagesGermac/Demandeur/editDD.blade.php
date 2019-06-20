@extends('layouts.masterGermac')
@section('title')
    Modification d'un demandeur
@endsection
@section('content')

    <div class="card">


        <h4 class="card-header">Modification des informations du demandeur {{$dd->nom_demandeur}}</h4>

        <form method="POST"  id="form-ops" action="{{ route('Demandeurs.update',$dd) }}" >
            <div class="modal-body">
                {!! csrf_field() !!}
                <p><input  type="hidden" name='_method' value="PUT" /></p>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <p >
                                    <input type="text" class="form-control" name="nom_demandeur" id="nom_demandeur" value="{{$dd->nom_demandeur}}">
                                </p>
                                <p >
                                    <input type="text" class="form-control" name="type_demandeur" id="type_demandeur" value="{{$dd->type_demandeur}}">
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" >Valider les modifications</button>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </form>

    </div>
@endsection