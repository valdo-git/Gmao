@extends('layouts.masterGT')

@section('content')
<div class="card">
        <div class="card-body">
            {{ 'Modification du matériel'.' '.$mat->designation}}
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('Materiels.update', $mat) }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <p><input  type="hidden" name='_method' value="PUT" /></p>
                <div class="input-group mb-3">
                    <input class="form-control" name="idgrpe" type="hidden" id="idgrpe" value="2">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">Immatriculation : </span>
                    </div>
                    <input class="form-control" name="numImmat" type="text" id="numImmat" value="{{$mat->numImmat}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">Désignation : </span>
                    </div>
                    <input class="form-control" name="designation" type="text" id="designation" value="{{$mat->designation}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">Horamètre initial : </span>
                    </div>
                    <input class="form-control" name="horometreInit" type="text" id="horometreInit" value="{{$mat->horometreInit}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">Horamètre actuel : </span>
                    </div>
                    <input class="form-control" name="horometre" type="text" id="horometre" value="{{$mat->horometre}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">Numéro de chassis : </span>
                    </div>
                    <input class="form-control" name="numChassis" type="text" id="numChassis" value="{{$mat->numChassis}}">
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">Date d'acquisition : </span>
                    </div>
                    <input class="form-control" name="dateAcquisitionMat" type="date" id="dateAcquisitionMat" value="{{$mat->dateAcquisitionMat}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3"> Date mise en circulation :</span>
                    </div>
                    <input class="form-control" name="dateMiseEnCirc" type="date" id="dateMiseEnCirc" value="{{$mat->dateMiseEnCirc}}" >
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3"> Type du matériel :</span>
                    </div>
                    <input class="form-control" name="typeMat" type="text" id="typeMat" value="{{$mat->typeMat}}">
                </div>


                <input class="btn btn-primary " type="submit" name="engR" value="Valider">
                <input class="btn btn-secondary " type="reset"  value="Annuler">
                <a  href="{{route('Materiels.index')}}" >Retour à la liste du matériel</a>
            </form>
        </div>

        </div>
    @endsection