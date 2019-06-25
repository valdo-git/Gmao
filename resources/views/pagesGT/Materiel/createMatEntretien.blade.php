@extends('adminlte::page')

@section('title', 'Nouveau matériel')

@section('content_header')
    <h3 class="box-title">Création d'un équipement d'entretien</h3>
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Nouveau matériel</li>
    </ol>
    @stop

@section('content')

    @include('../partials/GT/materiel/_addMatAndEmplacement')

    <!-- ============================================================== -->
    <!-- Formulaire de création d'un equipement d'entretien -->
    <!-- ============================================================== -->
    <div class="box box-solid ">
        
        <div class="box-body ">
            <div class="box-group " >
            <div class=" box box-primary">
               
                <div  >
                    <div class="box-body grpe1">
                        @include('pagesGT.Materiel.createMat3')
                    </div>
                </div>
            </div>
            
        </div>
       </div>
    <!-- /.box-body -->
    </div>

@endsection