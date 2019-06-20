@extends('adminlte::page')

@section('title', 'Création de dossier')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('Ordres.index') }}">Liste ordres </a></li>
        <li><a href="{{ route('Ordres.selectMat') }}">Sélection matériel </a></li>
        <li class="active">Création ordre</li>
    </ol>
    <h1>Création d'un dossier de visite</h1>
@stop

@section('content')

        <!-- ============================================================== -->
    <!-- Formulaire Dossier de visite -->
    <!-- ============================================================== -->
    <form method="POST" class="form-horizontal" action="{{ Route('Dossiers.store')}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
        <div class="box  box-solid box-primary">
            <div class ="box-header with-border bg-light-blue-gradient" ><h4 class="box-title">Informations du dossier de visite :&nbsp;&nbsp;&nbsp;&nbsp;</h4> </div>
            <div class ="box-body" >
              <div class="form-group row">
                            <label for="num_ordre" class="col-sm-3 text-right control-label col-form-label">Numero :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero du dossier de visite">
                            </div>
               </div>
              <div class="form-group row">
                            <label for="designation" class="col-sm-3 text-right control-label col-form-label">Désignation :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="designation" id="designation" placeholder="Désignation ">
                            </div>
                        </div>
              <div class="form-group row">
                            <label for="date_ouverture" class="col-sm-3 text-right control-label col-form-label">Date d'ouverture :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control date-inputmask" name="date_ouverture" id="date_ouverture" placeholder="JJ/MM/AAAA">
                            </div>
                        </div>
              <div class="form-group row">
                            <label for="date_fermeture" class="col-sm-3 text-right control-label col-form-label">Date de ferméture :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control date-inputmask" name="date_fermeture" id="date_fermeture" placeholder="JJ/MM/AAAA">
                            </div>
                        </div>
            </div>
     <!-- ============================================================== -->
     <!-- Liste des ordres de travail en attente du matériel -->
     <!-- ============================================================== -->
            <div class="box box-solid ">
                <div class ="box-header bg-light-blue-gradient" ><h4 class="box-title">Choix des ordres de travail :&nbsp;&nbsp;&nbsp;&nbsp;</h4> </div>
                    <div class="box-body">
                        @if (isset($collectionOrdreMat))
                            <table  class="table table-striped condensed">
                                        <thead >
                                            <tr>
                                                <th> Numero de l'ordre de travail </th>
                                                <th> Description de l'ordre </th>
                                                <th> Date de création </th>
                                                <th> Nombre d'opération </th>
                                                <th>Matériel concerné </th>
                                                <th>         </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach($collectionOrdreMat as $ordre)
                                                <tr>
                                                    <td> {{  $ordre->numero  }}</td>
                                                    <td> {{   $ordre->description   }}</td>
                                                    <td> {{   $ordre->date_creation   }}</td>
                                                    <td> {{  $ordre->operations()->count() }}</td>
                                                    <td>{{-- {{$desMat }}--}}</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="ordres[]" value="{{$ordre->id}}" class="custom-control-input" id="customCheck{{$ordre->id}}" >
                                                                <label class="custom-control-label" for="customCheck{{$ordre->id}}"></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                    </div>
                        @endif
                </div>
            </div>
        <!-- ============================================================== -->
        <!-- bouton de soumission du formulaire -->
        <!-- ============================================================== -->
        <div class="box-footer">
            <button type="reset" class="btn btn-default pull-left"><i class="fa fa-remove">&nbsp;</i>Annuler</button>
            <button  id="myBtn" type="submit" class="btn btn-primary pull-right">
                <i class="fa fa-check">&nbsp;</i>Créer le dossier</button>
        </div>
    </form>



@stop
