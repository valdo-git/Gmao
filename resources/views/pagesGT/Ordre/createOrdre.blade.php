@extends('adminlte::page')

@section('title', 'Création d\'un ordre de travail')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('Ordres.index') }}">Liste ordres </a></li>
        <li><a href="{{ route('Ordres.selectMat') }}">Sélection matériel </a></li>
        <li class="active">Création ordre</li>
    </ol>
    <h1>Création d'un ordre de travail</h1>
    @stop
@section('content')

        <!-- ============================================================== -->
<!-- Formulaire Ordre de travail -->
<!-- ============================================================== -->
    <form method="POST" class="form-horizontal" action="{{ Route('Ordres.store')}}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="box  box-solid box-primary">
                <div class ="box-header with-border bg-light-blue-gradient" ><h4 class="box-title">Informations de l'ordre de travail :&nbsp;&nbsp;&nbsp;&nbsp;</h4> </div>
                    <div class ="box-body" >
                        <div class="form-group">
                            <label for="num_ordre" class="col-sm-3 text-right control-label col-form-label">Numero de l'ordre de travail :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" name="numero" id="numero" placeholder="Numero " required>
                                @if ($errors->has('numero'))
                                    <span class="invalid-feedback bg-danger">
                                       <strong>{{ $errors->first('numero') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-3 text-right control-label col-form-label">Description de l'ordre de travail:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="description" id="description" placeholder="description" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_creation" class="col-sm-3 text-right control-label col-form-label">Date de création :</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control{{ $errors->has('date_creation') ? ' is-invalid' : '' }}" name="date_creation" id="date_creation" placeholder="JJ/MM/AAAA">
                                @if ($errors->has('date_creation'))
                                    <span class="invalid-feedback bg-danger">
                                       <strong>{{ $errors->first('date_creation') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
<!-- ============================================================== -->
 <!-- Liste des opérations du matériel -->
<!-- ============================================================== -->
            <div class="box box-solid box-primary">
                            <!-- Button to Open the Modal -->
                        <div class ="box-header bg-light-blue-gradient" ><h4 class="box-title">Choix des opérations :&nbsp;&nbsp;&nbsp;&nbsp;</h4> </div>
                        <div class="box-body">
                            @if (isset($listops))
                                <table  class="table table-striped condensed">
                                    <thead >
                                    <tr>
                                        <th> Code de l'opération </th>
                                        <th> Designation </th>
                                        <th> Périodicités </th>
                                        <th>  </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listops as $ops)
                                            <tr>
                                                <td> {{ $ops->code }}</td>
                                                <td> {{ $ops->designation }}</td>
                                                <td>
                                                    @php
                                                    $echeances = $ops->echeances()->get();
                                                    @endphp
                                                     @foreach($echeances as $echeance)
                                                        <li>{{$echeance->valeur .' '. $echeance->unite }}</li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="operations[]" value="{{$ops->id}}" class="custom-control-input" id="customCheck{{$ops->id}}" >
                                                            <label class="custom-control-label" for="customCheck{{$ops->id}}"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @endif
                        </div>
                    <!-- ============================================================== -->
                    <!-- bouton de soumission du formulaire -->
                    <!-- ============================================================== -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default pull-left"><i class="fa fa-remove">&nbsp;</i>Annuler</button>
                            <button  id="myBtn" type="submit" class="btn btn-primary pull-right">
                                <i class="fa fa-check">&nbsp;</i>Créer l'ordre de travail</button>
                        </div>
                    </div>
    </form>

@stop
