@extends('adminlte::page')

@section('title', 'liste d\'opération')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('Dossiers.selectMat') }}">Nouveau dossier</a></li>
        <li class="active">Liste d'opération</li>
    </ol>
    <h1>Liste des opérations</h1>
@stop


@section('content')
  <!-- ============================================================== -->
     <!-- Liste des opérations -->
     <!-- ============================================================== -->
            <div class="box box-solid  box-primary form-horizontal">
               
                <div class ="box-header bg-light-blue-gradient" ><h4 class="box-title">Liste des opérations de l'ordre nº{{$numero}}:</h4> </div>
                    <div class="box-body">
                        @if ($operations)
  
                            <table  class="table table-striped condensed">
                                        <thead >
                                            <tr>
                                                <th >#</th>
                                                <th > Code</th>
                                                <th > Désignation</th>
                                                <th > Observation</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach($operations as $operation)
                                          <tr>
                                              <td>{{$i++}}.</td>
                                              <td> {{  $operation->code  }}</td>
                                              <td> {{   $operation->designation  }}</td>
                                              <td> {{   $operation->observation   }}</td>
                                             
                                          </tr>
                                             @endforeach
 
                                        </tbody>
                                    </table>
                        @endif
                    </div>
                        

                </div>
                <div class="card-footer col-sm-12">
                    <button class="btn pull-right"><a href="{{route('Dossiers.create', compact('num_mat'))}}"><i class="fa fa-check-circle-o"></i>Retour</a></button>
                </div>
            </div>



@stop

                
