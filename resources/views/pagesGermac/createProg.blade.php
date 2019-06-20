@extends('layouts.masterGT')

<title>Nouveau Programme d'entretien</title>


@section('form')
    <br>

    <!-- ============================================================== -->
    <!-- Formulaire du programme -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border" >Nouveau programme</legend>

                    <form method="POST" class="form-horizontal" action="{{ Route('programs.store')}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <td><input name='idMat' value="{{ $idMat }}" /></td>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="num_prog" class="col-sm-3 text-right control-label col-form-label">Numero :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="num_prog" id="num_prog" placeholder="Numero du programme">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom_programme" class="col-sm-3 text-right control-label col-form-label">Nom :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nom_programme" id="lname" placeholder="Nom du proogramme ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_edition" class="col-sm-3 text-right control-label col-form-label">Date d'édition :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date-inputmask" name="date_edition" id="date_edition" placeholder="JJ/MM/AAAA">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="doc_ref" class="col-sm-3 text-right control-label col-form-label">Référence :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="doc_ref" id="doc_ref" placeholder="Document de référence">
                                </div>
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <input id="myBtn" type="submit" class="btn btn-primary" value="Ajouter Opérations">
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>

        </div>
    </div>


@stop
