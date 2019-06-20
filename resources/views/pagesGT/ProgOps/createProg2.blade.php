@extends('adminlte::page')

@section('title', 'Création programme')

@section('content_header')
    <h1>Création programme d'entretien
        <small>( Suite et fin )</small></h1>
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
    <form method="POST"  id="form-prog" action="{{ Route('programs.store')}}" >
        {!! csrf_field() !!}
        <div class="card">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informations du programme</h3>
                </div>
                <p><input  type="hidden" name='idMat' value="{{ $collection['materiel_id'] }}" /></p>
                <div class="box-body" >
                        <div class="row" >
                            <div class="col-xs-3 form-group">
                               <label for="InputNumProg">Numéro du programme :</label>
                               <input type="text"  class="form-control{{ $errors->has('num_prog') ? ' is-invalid' : '' }}" name="num_prog" value="{{ $collection['num_prog'] }}">
                                @if ($errors->has('num_prog'))
                                    <span class="invalid-feedback bg-danger">
                                           <strong>{{ $errors->first('num_prog') }}</strong>
                                     </span>
                                @endif
                           </div>

                            <div class="col-xs-3 form-group">
                                <label for="InputNomProg">Nom du programme :</label>
                               <input type="text"  class="form-control{{ $errors->has('nom_programme') ? ' is-invalid' : '' }}" name="nom_programme" value="{{ $collection['nom_programme'] }}" >
                                @if ($errors->has('nom_programme'))
                                    <span class="invalid-feedback bg-danger">
                                           <strong>{{ $errors->first('nom_programme') }}</strong>
                                     </span>
                                @endif
                            </div>

                            <div class="col-xs-3 form-group">
                                <label for="InputDateEdition">Date d'édition :</label>
                                <input type="text"  class="form-control" name="date_edition" value="{{ $collection['date_edition'] }}" >
                            </div>

                            <div class="col-xs-3">
                                <label for="InputDocRef">Document de référence :</label>
                                <input type="text" class="form-control" name="doc_ref" value="{{ $collection['doc_ref'] }}">
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Formulaire de création 1ère opération -->
        <!-- ============================================================== -->
        <div class="card">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulaire de création 1ère opération d'entretien</h3>
                </div>
                <div class="box-body">
                        <p><input type="hidden" name='idProg' value="{{$collection['idProg']}} " /></p>
                        <p class="text-center" >
                            <input type="text" class="form-control" name="code" id="code"  placeholder="Code de  l'opération" required >
                        </p>
                        <p >
                            <input type="text" class="form-control" name="designation" id="designationops" placeholder="designation" required>
                        </p>
                        <p >
                            <textarea  class="form-control " name="observation" id="observations" placeholder="Observations"></textarea>
                        </p>
                        <h4 class="text-capitalize text-danger">Les fréquences</h4>
                        <div class="col-xs-6 form-group">
                            <label class="text" id="">1ère Fréquence :</label>
                            <input name="valFreq1" type="text" placeholder="Entrez la valeur" required >
                            <select name="unitefreq1" required >
                                    @foreach($collectionfreq as $fre)
                                        <optgroup label="{{$fre['type']}}">
                                            @foreach( $fre['unites'] as $unite)
                                                <option value="{{ $unite. '|' . $fre['type'] }}">{{$unite}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col-xs-6 form-group">
                            <label class="text" id="">2ème Fréquence :</label>
                            <input name="valFreq2" type="text" placeholder="Entrez la valeur ici " >
                            <select  name="unitefreq2"  class="custom-select" >
                                @foreach($collectionfreq as $fre)
                                    <optgroup label="{{$fre['type']}}">
                                        @foreach( $fre['unites'] as $unite)
                                            <option value="{{ $unite. '|' . $fre['type'] }}">{{$unite}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="box-footer ">
                    <div align="right" class="form-inline" >
                        <button type="reset" class="btn btn-secondary" >
                            <i class="fa fa-angle-left">&nbsp;</i>Annuler création programme
                        </button>
                        <button type="submit" class="btn btn-primary"  >
                            <i class="fa fa-angle-right">&nbsp;</i>Valider création programme
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @endsection