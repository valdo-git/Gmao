@extends('adminlte::page')

@section('title', 'Accueil Gestion technique')

@section('content_header')
    <h1 class="card-header">Liste des dossiers de visite {{$statut}} :
    <a href="{{ route('homeGT') }}"  class="btn btn-outline-info pull-right" >
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
                    <th> Date d'ouverture </th>
                    <th> Date de fermeture  </th>
                    <th> </th>
                    <th> </th>
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
                             //$ratio = ($nbreOT_ferme * 100)/$nbreOT;
                        // gestion affichage date
                            $date_ouverture = Carbon\Carbon::parse($dv->date_ouverture);
                            $date_ouverture = $date_ouverture->format('d-m-Y');
                            $date_fermeture = Carbon\Carbon::parse($dv->date_fermeture);
                            $date_fermeture = $date_fermeture->format('d-m-Y');
                    @endphp
                    <tr>
                        <td> {{  $dv->numero  }}</td>
                        <td> {{   $dv->designation   }}</td>
                        <td> {{  $date_ouverture  }}</td>
                        <td> {{   $date_fermeture    }}</td>
                        <td>
                            <a href="{{route('Dossiers.show', $dv)}}"
                                    class="btn btn-primary  btn-sm" >
                                    <i class="icon ion-eye"></i> 
                                 Afficher
                            </a>
                        </td>
                        <td>
                            <a href="{{route('Dossiers.edit', [$dv->id])}}"
                                    class="btn btn-primary  btn-sm" >
                                    <i class="icon ion-compose"></i> 
                                 Modifier
                            </a>
                        </td>
                        <td> 
                            <form action="{{ Route('Dossiers.destroy', $dv) }}" method="post" class="d-inline-block">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet ordre de travail ?')">
                                <i class="icon ion-android-delete"></i> Supprimer
                            </button>
                           
                            </form>
                        </td>
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



@stop

