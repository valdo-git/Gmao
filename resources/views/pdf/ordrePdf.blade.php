<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
  .page-break {
    page-break-after: always;
    text-align: center;

  }
  table, th, td{
  	border: 1px solid black;
  	border-collapse: collapse;
  	text-align: center;
  	padding: .4em;
  }
</style>
</head>
<body>
	@php
		$pageNumber = 1;
	@endphp
	@foreach($ordresDv as $ordre)
	@php
		
		$operationsOrdre = App\Ordre::findOrFail($ordre->id)->operations()->get();
	@endphp
	<div class="card box container" style="margin-top: 1.5em; padding-bottom: .5em">
		<div class="card-header"><h3>Traitement des opérations</h3></div>
		<div class="card-body">
			<div class="text-center">
				<h4>Dossier n° {{$numeroDv[0]->numero}}</h4>
				<p>Ordre n° {{$ordre->numero}}</p>
				<p>Programme : </p>
				<p>Materiel : </p>
			</div>
			<table class="table text-center" ">
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


			@foreach($operationsOrdre as $operation)
			
			<tr>
				<td>{{$operation->code}}</td>
				<td>{{$operation->designation}}</td>
				<td>{{$operation->observation}}</td>
				<td><input type="checkbox" name="execute[]" value="" class="custom-control-input" id="customChec"> </td>
				<td></td>
				<td></td>
			</tr>
			
			@endforeach
				</tbody>
			</table>
	
		</div>
		
<p style="text-align: center;">- Page {{$pageNumber }} -</p>
<div class="page-break"></div>
@php
$pageNumber++;
@endphp
	</div>
@endforeach
</body>
</html>