@extends('adminlte::page')

@section('title', 'Création programme')

@section('content_header')
    <h1>Création programme d'entretien
        <small>( 1ère étape )</small></h1>
        <div align="right">
            <a href="{{ route('homeGT') }} "  class="btn btn-outline-info" >
                <i class="fa fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>
@stop

@section('content')

    <!-- ============================================================== -->
    <!-- Formulaire du programme d'entretien -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informations du programme</h3>
            </div>
            <form method="POST"  id="form-prog" action="{{ Route('createProg1to2')}}" >
                {!! csrf_field() !!}
                <p><input  type="hidden" name='idMat' value="{{ $idMat }}" /></p>
                <div class="box-body" >

                    <p >
                        <input type="text"  class="form-control{{ $errors->has('num_prog') ? ' is-invalid' : '' }}" name="num_prog" id="code" placeholder="Numero du programme" required>
                        @if ($errors->has('num_prog'))
                            <span class="invalid-feedback bg-danger">
                                   <strong>{{ $errors->first('num_prog') }}</strong>
                             </span>
                        @endif
                    </p>

                    <p >
                        <input type="text"  class="form-control{{ $errors->has('nom_programme') ? ' is-invalid' : '' }}" name="nom_programme" id="designationops" placeholder="Nom du proogramme" required>
                        @if ($errors->has('nom_programme'))
                            <span class="invalid-feedback bg-danger">
                                   <strong>{{ $errors->first('nom_programme') }}</strong>
                             </span>
                        @endif
                    </p>

                    <p >
                        <input type="date"  class="form-control " name="date_edition" id="observations" placeholder="Date d'édition(JJ/MM/AAAA")>
                    </p>
                    <p >
                        <input type="text" class="form-control" name="doc_ref" id="doc_ref" placeholder="Document de référence">
                    </p>
                </div>
                <div class="box-footer">
                    <div align="right" >
                        <button type="submit" class="btn btn-primary" >
                            <i class="fa fa-plus">&nbsp;</i>Ajouter une opération
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- MAP & BOX PANE -->
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Visitors Report</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="pad">
                        <!-- Map will be created here -->
                        <div id="world-map-markers" style="height: 325px;"></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                    <div class="pad box-pane-right bg-green" style="min-height: 280px">
                        <div class="description-block margin-bottom">
                            <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                            <h5 class="description-header">8390</h5>
                            <span class="description-text">Visits</span>
                        </div>
                        <!-- /.description-block -->
                        <div class="description-block margin-bottom">
                            <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                            <h5 class="description-header">30%</h5>
                            <span class="description-text">Referrals</span>
                        </div>
                        <!-- /.description-block -->
                        <div class="description-block">
                            <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                            <h5 class="description-header">70%</h5>
                            <span class="description-text">Organic</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


@endsection