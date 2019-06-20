@extends('adminlte::page')

@section('title', 'Accueil Gestion technique')

@section('content_header')
    <h1 class="card-header">Liste des dossiers de visite {{$statut}} :&nbsp;  &nbsp;&nbsp;
    <a href="{{ route('homeGT') }}"  class="btn btn-outline-info" >
        <i class="fa fa-arrow-left"></i> Retour à l'accueil
    </a>
    </h1>
@stop

@section('content')

<div class="card">

     <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">
                    <a class="text-danger" href="{{route('Dossiers.index',['DV_fermes'=>'false',])}}">
                        <i class="fa fa-unlock"></i> Dossiers ouverts
                    </a>&nbsp;&nbsp;&nbsp;

                    <a class="text-primary" href="{{route('Dossiers.index',['DV_fermes'=>'true'])}}" >
                        <i class="fa fa-lock"></i> Dossiers fermés
                    </a>
                </h3>
            </div>
         @if ($listDV->isEmpty())
             <h4 class="text-center text-warning">Auncun dossier de visite n'est enregistré. &nbsp;  </h4>
         @else

            <div class="box-body">
                <table class="table table-bordered ">
                <tr>
                    <th> Numero </th>
                    <th> Designation </th>
                    <th> Date de fermeture </th>
                    <th> Dépassement </th>
                    <th> Nombre OT du dossier </th>
                    <th> Nombre OT exécutés </th>
                    <th> Ratio exécution </th>
                    <th> </th>

                </tr>
                @foreach($listDV as $dv)
                    @php
                        // gestion du dépassement
                            if (  $dv->date_fermeture < today('UTC') )
                                $depassement ='Oui';
                            else
                                $depassement ='Non';
                        // gestion des OT
                            $lisOT = $dv->ordres()->get();
                            $nbreOT_ouvert = $lisOT->where('statut','Ouvert')->count();
                            $nbreOT = $lisOT->count();
                            $nbreOT_ferme = $lisOT->where('statut','Fermé')->count();
                        // gestion du ratio exec
                             $ratio = ($nbreOT_ferme * 100)/$nbreOT;
                        // gestion affichage date
                            $date_fermeture = Carbon\Carbon::parse($dv->date_fermeture);
                            $date_fermeture = $date_fermeture->format('d-m-Y');
                    @endphp
                    <tr>
                        <td> {{  $dv->numero  }}</td>
                        <td> {{   $dv->designation   }}</td>
                        <td> {{  $date_fermeture   }}</td>
                        <td> {{   $depassement   }}</td>
                        <td>
                            <a class="form-check-label " href="{{route('Ordres.indexDV',['OT_fermes'=>'false','DvId'=>$dv->id])}}">
                            {{   $nbreOT   }} <i class="fa fa-eye"></i>
                            </a>&nbsp;
                        </td>
                        <td>
                            <a class="form-check-label " href="{{route('Ordres.indexDV',['DV_fermes'=>'true','DvId'=>$dv->id])}}">
                            {{   $nbreOT_ferme   }} <i class="fa fa-eye"></i>
                            </a>&nbsp;
                        </td>
                        <td> {{   $ratio   }} %</td>
                    </tr>
                @endforeach
            </table>
            </div>

             <div class="box-footer clearfix">
                 <ul class="pagination pagination-sm no-margin pull-right">
                     <li> {{$listDV->links()}}</li>
                 </ul>
             </div>
        @endif
     </div>

</div>
@endsection