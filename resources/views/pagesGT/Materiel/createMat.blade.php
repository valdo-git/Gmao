
@extends('adminlte::page')

@section('title', 'Nouveau matériel')

@section('content_header')
    <h3 class="box-title">Ajout d'un matériel</h3>
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Nouveau matériel</li>
    </ol>
    @stop

@section('content')

     <!-- ============================================================== -->
    <!-- Formulaire modal d'ajout d'un atelier -->
    <!-- ============================================================== -->
    <div class="modal fade" id="myModalAt">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Création atelier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST"  id="form-ops" action="{{ route('Ateliers.store2') }}" >
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body">
                                        <p >
                                            <input type="text" class="form-control" name="nom_atelier" id="nom_atelier" placeholder="*Nom de l'atelier" required>

                                        </p>

                                        <p >
                                            <input type="text" class="form-control" name="nom_chef" id="nom_chef" placeholder="*Grade et nom du chef d'atelier" required>
                                            @if ($errors->has('nom_chef'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('nom_chef') }}</strong>
                                                </span>
                                            @endif
                                        </p>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon3">Date de création : </span>
                                            </div>
                                            <input type="date" class="form-control" name="date_creation" id="date_creation">


                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="newop">Enregistrer</button>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- FIN Formulaire modal d'ajout d'un atelier -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Formulaire modal d'ajout d'un emplacement -->
    <!-- ============================================================== -->
    <div class="modal fade" id="myModalEmp">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Création emplacement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST"  id="form-ops" action="{{ route('Emplacements.store2') }}" >
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body">
                                        <p >
                                            <input type="text" class="form-control" name="designation" id="designation" placeholder="*Désignation de l'emplacement" required>
                                        </p>
                                        <p >
                                            <input type="text" class="form-control" name="gisement" id="gisement" placeholder="*Gisement" required>
                                        </p>
                                        <p >
                                            <textarea  class="form-control" name="observations" id="observations" >Obsevations sur l'emplacement</textarea>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="newop">Enregistrer</button>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- FIN Formulaire modal d'ajout d'un emplacement -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Formulaire de création d'un matériel -->
    <!-- ============================================================== -->
    <div class="box box-solid ">
        <div class="box-header with-border">
            <h4 class="box-title">Cliquez sur un groupe pour afficher le formulaire</h4>
        </div>
        <div class="box-body ">
            <div class="box-group " id="accordion">
            <div class=" box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                           Création d'un engin roulant
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body grpe1">
                        @include('pagesGT.Materiel.createMatgrpe1')
                    </div>
                </div>
            </div>
            <div class=" box box-danger">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Création d'un équipements spécial
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body grpe2">
                        @include('pagesGT.Materiel.createMatgrpe2')
                    </div>
                </div>
            </div>
            <div class=" box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Création d'un équipement d'entretien
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body grpe3">
                        @include('pagesGT.Materiel.createMat3')
                    </div>
                </div>
            </div>
        </div>
       </div>
    <!-- /.box-body -->
    </div>



@endsection










