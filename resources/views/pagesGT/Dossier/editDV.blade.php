@extends('adminlte::page')

@section('title', 'Modification de dossier')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-home"></i> Home</a></li>
        
        <li class="active">Modification du dossier de visite</li>
    </ol>
    <h1>Mdification du dossier de visite</h1>
@stop

@section('content')

        <!-- ============================================================== -->
    <!-- Formulaire Dossier de visite -->
    <!-- ============================================================== -->
    <form method="POST" class="form-horizontal" action="{{route('Dossiers.update', ['idDV' => $dossierV->id])}}" enctype="multipart/form-data">
         {!! csrf_field() !!}

         {{method_field('PUT')}}


@include('pagesGT/Dossier/_formDV', ['buttonText'=>'Modifier le dossier'])

</form>

@endsection