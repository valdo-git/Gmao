@extends('adminlte::page')

@section('title', 'Accueil Gestion technique')


@section('content_header')
    <p class="card-header">
    <a href="{{ route('homeGT') }}"  class="btn btn-outline-info pull-right" >
        <i class="fa fa-arrow-left"></i> Retour à l'accueil
    </a>
    <h3>Informations récapitulatives du dossier</h3>
    </p>
@stop

@section('content')

<!-- ============================================================== -->
<!-- Formulaire Dossier de visite -->
<!-- ============================================================== -->
    
<div class="box  box-solid box-primary">
     <div class ="box-header with-border bg-light-blue-gradient" ><h4 class="box-title">Dossier de visite n° {{ $dossier->numero }} :</h4> </div>
        <div class ="box-body" >
            <div class="form-group">
            	<table class="table text-center">
               		<tr>
                    	<th> Numero </th>
                   		<th> Designation </th>
                    	<th>Date de fermeture  </th>
                    	<th> Nombre OT du dossier</th>
                	</tr>
                	@php
                        // gestion du dépassement
                            if (  $dossier->date_fermeture < today('UTC') )
                                $depassement ='Oui';
                            else
                                $depassement ='Non';
                        // gestion des OT
                            $nbreOT_ouvert = $lisOT->where('statut','Ouvert')->count();
                            $nbreOT = $lisOT->count();
                            $nbreOT_ferme = $lisOT->where('statut','Fermé')->count();
                        // gestion du ratio exec
                             $ratio = ($nbreOT_ferme * 100)/$nbreOT;
                        // gestion affichage date
                            $date_fermeture = Carbon\Carbon::parse($dossier->date_fermeture);
                            $date_fermeture = $date_fermeture->format('d-m-Y');
                    @endphp
              
                    <tr>
                        <td> {{  $dossier->numero  }}</td>
                        <td> {{   $dossier->designation   }}</td>
                        <td> {{  $date_fermeture  }}</td>
                        <td> {{   $nbreOT_ouvert  }}</td>
                    </tr>
                
            	</table>
                            
            </div>
                       
        </div>
            
<!-- ============================================================== -->
 <!-- Liste des ordres de travail du dossier -->
<!-- ============================================================== -->
    
    <div class ="box-header bg-light-blue-gradient" ><h4 class="box-title">Liste des ordres de travail du dossier de visite</h4> </div>
        <div class="box-body">
                            
            <table  class="table table-striped condensed text-center">
                <thead>
                    <tr>
                        <th> Numéro </th>
                        <th> Description </th>
                        <th> Date de création </th>
                        <th> Traitement</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($lisOT as $ordre)
                        @php
                        // gestion affichage date
                            $date = Carbon\Carbon::parse($ordre->date_creation);
                            $date = $date->format('d-m-Y');                            
                        @endphp
                    <tr>
                        <td> {{ $ordre->numero }}</td>
                        <td> {{ $ordre->description }}</td>
                        <td>{{ $date }}</td>
                         <td><a href="{{route('dossiers.infosTraitement', ['numeroDv'=>$dossier->numero, 'numerOrdre'=>$ordre->numero, 'id'=>$ordre->id])}}">Info</a></td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            <!-- ============================================================== -->
                    <!-- bouton de soumission du formulaire -->
                    <!-- ============================================================== -->
    	<div class="box-footer">
   		<a href="{{route('dossier.pdf', ['idDv'=>$dossier->id])}}" class="btn btn-success pull-right">
   			<i class="fa fa-print"></i> Imprimer</a> 
    </div>
    	</div>
    	
   </div>   

@stop
