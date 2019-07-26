@extends('adminlte::page')

@section('title', 'Création de dossier')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('Dossiers.selectMat') }}">Sélection matériel </a></li>
        <li class="active">Création un dossier de visite</li>
    </ol>
    <h1>Création d'un dossier de visite</h1>
@stop

@section('content')

        <!-- ============================================================== -->
    <!-- Formulaire Dossier de visite -->
    <!-- ============================================================== -->
    <form method="POST" class="form-horizontal" action="{{ Route('Dossiers.store')}}" enctype="multipart/form-data">
    	 {!! csrf_field() !!}

@include('pagesGT/Dossier/_formDV', ['buttonText'=>'Créer le dossier'])

</form>

@endsection