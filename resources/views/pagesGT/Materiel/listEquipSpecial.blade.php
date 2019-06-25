@extends('adminlte::page')

@section('title', 'Liste Matériel')

@section('content_header')
    <h3 class="box-title">Liste des équipements spciaux</h3>
    <ol class="breadcrumb">é
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Liste des équipements spéciaux</li>
    </ol>
    @stop

@section('content')

    <!-- ============================================================== -->
    <!-- Formulaire liste des equipements speciaux -->
    <!-- ============================================================== -->
    <div class="box box-solid ">
        
        <div class="box-body ">
            <div class="box-group " >
            <div class=" box box-primary">
               
                <div>
                    <div class="box-body grpe1">

                        @include('pagesGT.Materiel.indexMatGrpe2')

                    </div>
                </div>
            </div>
            
        </div>
       </div>
    <!-- /.box-body -->
    </div>

@endsection