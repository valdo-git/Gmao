@extends('adminlte::page')

@section('title', 'Modifications données')

@section('content')

    <div class="box box-solid box-primary">

        <form class="form-horizontal"  method="POST" action="{{ route('User.update', Auth::user()->id) }}" accept-charset="UTF-8">
            {!! csrf_field() !!}
        <div class="box-header with-border bg-light-blue-gradient">
            <h4 class="box-title"> {{ 'Vos informations :'.' '. Auth::user()->grade.' '.Auth::user()->name}}</h4>
        </div>
        <div class="form-group">
            <input class="form-control" name="id" type="hidden" id="id" value="{{Auth::user()->id}}">
        </div>
        <div class="box-body ">
            <p><input  type="hidden" name='_method' value="PUT" /></p>
            <div class="form-group">
                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Grade : </label>
                <div class="col-sm-4">
                    <input class="form-control" name="grade" type="text" id="grade" value="{{Auth::user()->grade}}" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Nom : </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" >
                </div>
            </div>

            <div class="form-group ">
                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Email : </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" >
                </div>
            </div>

            <div class="form-group ">
                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Qualification : </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="qualification" id="qualification" value="{{Auth::user()->qualification}}" >
                </div>
            </div>

            <div class="form-group ">
                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Matricule : </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="matricule" id="matricule" value="{{Auth::user()->matricule}}" >
                </div>
            </div>

            <div class="form-group ">
                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Statut : </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="statut" id="statut" value="{{Auth::user()->statut}}" >
                </div>
            </div>

        </div>

        <div class="box-footer ">
            <button  id="myBtn" type="submit" class="btn btn-success pull-right">
                <i class="fa fa-check-circle">&nbsp;</i>Valider les modifications</button>
        </div>

        </form>

    </div>
@endsection