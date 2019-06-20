@extends('layouts.masterGermac')
@section('title')
    Liste des ordres de travail
@endsection
@section('content')


    <div class="card">

        <div class="card-header">
            <div class="form-check-inline">
                <h4 >Liste des ordres de travail {{$titre}} du dossier {{$dossier->numero}} :</h4>  &nbsp;&nbsp;
                <a class="text-danger " href="{{route('Ordres.indexDV',['OT_fermes'=>'false','DvId'=>$dossier->id])}}">
                    <i class="fa fa-door-open"></i> Ordres ouverts
                </a>&nbsp;&nbsp;&nbsp;
                <a class="text-primary " href="{{route('Ordres.indexDV',['OT_fermes'=>'true','DvId'=>$dossier->id])}}" >
                    <i class="fa fa-door-closed"></i> Ordres fermés
                </a>
            </div>


        </div>

        @if ($listordre->isEmpty())
            <h4 class="text-center text-dark ">Auncun ordre de travail n'est enregistré. &nbsp;  </h4>
        @else

            <div class="dataTable ">
                <table id="zero_config" class="table table-sm text-center">

                    <thead class="thead">
                    <tr>

                        <th> Numero </th>
                        <th> Description </th>
                        <th> Date de création </th>
                        <th> Nombre de carte de l'OT </th>
                        <th> Nombre de carte de exécutés </th>
                        <th> Ratio exécution </th>
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($listordre as $ordre)
                        @php

                        // gestion des CT
                        $lisCT = $ordre->operations()->get();
                        //$nbreOT_ouvert = $lisOT->where('statut','Ouvert')->count();
                        $nbreCT = $lisCT->count();
                        //$nbreCT_ferme = $lisOT->where('statut','Fermé')->count();
                        // gestion du ratio exec
                        //$ratio = ($nbreOT_ferme * 100)/$nbreOT

                        @endphp
                        <tr>
                            <td> {{  $ordre->numero  }}</td>
                            <td> {{   $ordre->description   }}</td>
                            <td> {{   $ordre->date_creation   }}</td>
                            <td>
                                <a class="form-check-label " href="{{route('Dossiers.index',['DV_fermes'=>'false'])}}">
                                    {{   $nbreCT   }} <i class="fa fa-eye"></i>
                                </a>&nbsp;
                            </td>
                            <td>
                                <a class="form-check-label " href="{{route('Dossiers.index',['DV_fermes'=>'false'])}}">
                                    {{--   $nbreOT_ferme   --}} <i class="fa fa-eye"></i>
                                </a>&nbsp;
                            </td>
                            <td> {{--   $ratio   --}} %</td>



                        </tr>


                    @endforeach

                    </tbody>

                </table>
            </div>
            {{$listordre->links()}}
        @endif

    </div>


@endsection