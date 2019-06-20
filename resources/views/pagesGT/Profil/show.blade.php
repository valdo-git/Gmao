@extends('adminlte::page')

@section('title', 'Informations utilisateurs')

@section('content')

    <div class="box box-solid box-primary">

        <form class="form-horizontal"  method="get" action="{{ route('User.edit', Auth::user()->id) }}" accept-charset="UTF-8">
            {!! csrf_field() !!}
            <div class="box-header with-border bg-light-blue-gradient">
                <h4 class="box-title"> {{ 'Vos informations :'.' '. Auth::user()->grade.' '.Auth::user()->name}}</h4>
            </div>
        <div class="form-group">
            <input class="form-control" name="id" type="hidden" id="id" value="{{Auth::user()->id}}">
        </div>
            <div class="box-body ">

                            <div class="form-group">
                                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Grade : </label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="grade" type="text" id="grade" value="{{Auth::user()->grade}}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                 <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Nom : </label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" readonly>
                                </div>
                             </div>

                            <div class="form-group ">
                                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Email : </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" readonly>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Qualification : </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="qualification" id="qualification" value="{{Auth::user()->qualification}}" readonly>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Matricule : </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="matricule" id="matricule" value="{{Auth::user()->matricule}}" readonly>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-sm-3 text-right control-label col-form-label" id="basic-addon3">Statut : </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="statut" id="statut" value="{{Auth::user()->statut}}" readonly>
                                </div>
                            </div>

        </div>

            <div class="box-footer ">
            <button  id="myBtn" type="submit" class="btn btn-primary pull-right">
                <i class="fa fa-chevron-up">&nbsp;</i>Modifier ces informations</button>
        </div>

        </form>

    </div>
        @endsection