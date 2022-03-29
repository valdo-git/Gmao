@extends('adminlte::page')

@section('title', 'Liste ordre')

@section('content_header')

    @if (isset($ouverts))
        <h1 class="card-header">Liste des ordres de travail {{$ouverts}} :&nbsp;
            <a href="{{ route('homeGT') }}"  class="btn btn-outline-info" >
                <i class="fa fa-arrow-circle-left"></i> Retour à l'accueil
            </a>
        </h1>
    @else
        <h1 class="card-header">Ordres de travail: 
            <a href="{{route('Ordres.index', ['statut' => 'En Attente'])}}" class="btn btn-secondary " > En attente
            </a>
            <a href="{{route('Ordres.index', ['statut' => 'Ouvert'])}}" class="btn btn-secondary" >
           <i class="fa fa-file"></i> Ouverts
          </a>
          <a href="{{route('Ordres.index', ['statut' => 'Ferme'])}}"  class="btn btn-secondary" >
           <i class="fa fa-close"></i> Fermés
          </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="{{ route('Ordres.selectMat') }}"  class="btn btn-primary " >
           <i class="fa fa-plus"></i> Ajouter un ordre de travail
          </a>
          <a href="{{ route('homeGT') }}"  class="btn btn-outline-info" >
             <i class="fa fa-arrow-circle-left"></i> Retour à l'accueil
          </a>
        </h1>
    @endif
@stop

@section('content')
       <!-- ============================================================== -->
        <!-- Tableau des ordres de travail -->
        <!-- ============================================================== -->
                <div class="card">
                    @if ($listordre->isEmpty())
                        <h4 class="text-center text-warning">Aucun ordre de travail. &nbsp;  </h4>
                    @else

                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{$listordre->count()}} {{str_plural('ordre',$listordre->count()) }} de travail {{str_plural('concerné',$listordre->count()) }}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th >#</th>
                                        <th > Numero OT </th>
                                        <th > Description </th>
                                        <th > Date création </th>
                                        <th > Opérations </th>
                                        <th >Matériel </th>
                                        @if (isset($ouverts))
                                            <th >Dossier de visite</th>
                                        @endif
                                        <th ></th>
                                    </tr>

                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($listordre as $ordre)
                                        <tr>
                                            <td>{{$i++}}.</td>
                                            <td> {{  $ordre->numero  }}</td>
                                            <td> {{   $ordre->description   }}</td>
                                            <td> {{   $ordre->date_creation   }}</td>
                                            <td > {{  $ordre->operations()->count() }}</td>

                                            @php
                                                $uneops = $ordre->operations()->first();
                                                $prog = $uneops->program()->first();
                                                $mat = $prog->materiel()->first();
                                            @endphp

                                            <td> {{$mat->designation }}</td>
                                            @if (!isset($ouverts))
                                                <td >
                                                    <form action="{{ Route('Ordres.destroy',['id'=> $ordre->id]) }}"
                                                          method="post"
                                                          class="d-inline-block">
                                                        {{csrf_field()}}

                                                        <a href="{{Route('Ordres.edit',['id'=> $ordre->id])}}"
                                                           class="btn btn-primary  btn-sm" >
                                                            <i class="icon ion-compose"></i> Modifier
                                                        </a>

                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet ordre de travail ?')">
                                                            <i class="icon ion-android-delete"></i> Supprimer
                                                        </button>
                                                        <input type="hidden" name='idordre' value="{{ $ordre->id }}" />
                                                    </form>

                                                </td>
                                            @else
                                                @php
                                                //pour info dossier
                                                    $dossier = $ordre->dossier();
                                                @endphp
                                                <td >
                                                    {{$dossier->first()->designation}}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <li>{{$listordre->links()}}</li>
                                </ul>
                            </div>
                        </div>
                        @endif
                                <!-- /.box -->
                </div>



   @endsection

