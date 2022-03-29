@extends('adminlte::page')

@section('title', 'Modification Matériel')

@section('content_header')
    <h3 class="box-title">Modification infos matériel</h3>
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('Materiels.index')}}">Liste matériel</a></li>
        <li class="active">infos matériel</li>
    </ol>

@stop

@section('content')

    <div class="box box-solid box-primary">
        <form class="form-horizontal" method="POST" action="{{ route('Materiels.update', $mat) }}" accept-charset="UTF-8">
            {!! csrf_field() !!}
        <div class="box-header with-border bg-light-blue-gradient">
            <h4 class="box-title"> {{ 'Modification du matériel :'.' '.$mat->designation}}</h4>
        </div>
        <div class="box-body ">
                <p><input  type="hidden" name='_method' value="PUT" /></p>
                <div class="form-group">
                    <input class="form-control" name="idgrpe" type="hidden" id="idgrpe" value="1">
                </div>

                <div class="form-group">
                    <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Immatriculation : </label>
                    <div class="col-sm-6">
                    <input class="form-control" name="numImmat" type="text" id="numImmat" value="{{$mat->numImmat}}">
                        @if ($errors->has('numImmat'))
                            <span class="invalid-feedback bg-danger">
                                       <strong>{{ $errors->first('numImmat') }}</strong>
                                  </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Désignation : </label>
                    <div class="col-sm-6">
                    <input class="form-control" name="designation" type="text" id="designation" value="{{$mat->designation}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Kilométrage initial : </label>
                    <div class="col-sm-6">
                    <input class="form-control" name="kilometrageInit" type="text" id="kilometrageInit" value="{{$mat->kilometrageInit}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Kilométrage : </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="kilometrage" type="text" id="kilometrage" value="{{$mat->kilometrage}}"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Numéro de chassis : </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="numChassis" type="text" id="numChassis" value="{{$mat->numChassis}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Date d'acquisition : </label>
                    <div class="col-sm-6">
                        <input class="form-control" name="dateAcquisitionMat" type="text" id="dateAcquisitionMat" value="{{$mat->dateAcquisitionMat}}">
                        @if ($errors->has('dateAcquisitionMat'))
                            <span class="invalid-feedback bg-danger">
                                       <strong>{{ $errors->first('dateAcquisitionMat') }}</strong>
                                  </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3"> Date mise en circulation :</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="dateMiseEnCirc" type="text" id="dateMiseEnCirc" value="{{$mat->dateMiseEnCirc}}" >
                        @if ($errors->has('dateMiseEnCirc'))
                            <span class="invalid-feedback bg-danger">
                                       <strong>{{ $errors->first('dateMiseEnCirc') }}</strong>
                                  </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3"> Type du matériel :</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="typeMat" type="text" id="typeMat" value="{{$mat->typeMat}}">
                    </div>
                </div>
        </div>
            <div class="box-footer ">
                <button type="reset" class="btn btn-default pull-left"><i class="fa fa-remove">&nbsp;</i><a href="{{ route('Materiels.index') }}">Annuler</a></button>
                <button  id="myBtn" type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-check">&nbsp;</i>Valider les modifications</button>
            </div>
            </form>

    </div>
    @endsection