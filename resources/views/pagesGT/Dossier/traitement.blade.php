@extends('adminlte::page')

@section('title', 'Accueil Gestion technique')


@section('content_header')
    <p class="card-header">
    <a href="{{ route('homeGT') }}"  class="btn btn-outline-info pull-right" >
        <i class="fa fa-arrow-left"></i> Retour à l'accueil
    </a>
    
    </p>
@stop

@section('content')
<form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
    	 {!! csrf_field() !!}
<div class="card box container" style="margin-top: 1.5em; padding-bottom: .5em">
	<div class="card-header"><h3>Traitement des opérations</h3></div>
	<div class="card-body">
	<div class="text-center">
		<h4>Dossier n° {{$numeroDv}}</h4>
		<p>Ordre n° {{$numerOrdre}}</p>
		<p>Programme : {{$pgrme->nom_programme}}</p>
		<p>Materiel : {{$materiel->designation}}</p>
	</div>
	<table class="table text-center">
		<thead>
			<tr>
				<th>Code</th>
				<th>Désignation</th>
				<th>Observation opération</th>
				<th>Exécuter</th>
				<th>Date d'éxécution</th>
				<th>Commentaire d'éxécution</th>
			</tr>
		</thead>
		<tbody>
			@foreach($operations as $operation)
			<tr>
				<td>{{$operation->code}}</td>
				<td>{{$operation->designation}}</td>
				<td>{{$operation->observation}}</td>
				<td><input type="checkbox" name="execute[]" value="" class="custom-control-input" id="customChec"> </td>
				<td><input type="date" name=""></td>
				<td><input type="text" name=""></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<button type="submit" class="pull-right">Enregister</button>
	</div>
</div>
</form>
@stop