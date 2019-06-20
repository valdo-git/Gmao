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
    <!-- Formulaire modal d'ajout d'une opération -->
    <!-- ============================================================== -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nouvelle opération</h4>
                </div>

                <div class="modal-body">
                    <form method="POST"  id="form-ops" action="{{ Route('programs.operations.store',['idProg'=> $program->id ]) }}" >
                            {!! csrf_field() !!}
                        <div class="box box-primary">
                             <div class="box-body">
                                 <p><input type="text" name='idProg' value="{{ $program->id }}" /></p>
                                            <h4 class="card-header">L'opération</h4>
                                            <p class="text-center" >
                                                <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" id="code"  placeholder="Code de  l'opération" required >
                                                @if ($errors->has('code'))
                                                    <span class="invalid-feedback bg-danger">
                                                         <strong>{{ $errors->first('code') }}</strong>
                                                     </span>
                                                @endif
                                            </p>
                                            <p >
                                                <input type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" id="designationops" placeholder="designation" required>
                                                @if ($errors->has('num_prog'))
                                                    <span class="invalid-feedback bg-danger">
                                                         <strong>{{ $errors->first('designation') }}</strong>
                                                     </span>
                                                @endif
                                            </p>
                                            <p >
                                                <textarea  class="form-control " name="observation" id="observations" placeholder="Observations"></textarea>
                                            </p>
                                            <h4 class="text-capitalize">Les fréquences</h4>
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="newop">Enregistrer</button>
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

 <!-- ============================================================== -->
 <!-- Formulaire modal de modif d'une opération -->
 <!-- ============================================================== -->
     <div class="modal fade" id="myModalModif">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modification d'une opération</h4>
                </div>

                <div class="modal-body">
                    <form method="POST"  id="form-ops" action="{{ Route('programs.operations.update',['id'=> $program->id,'idops' ]) }}" >
                        {!! csrf_field() !!}
                        <p><input  type="hidden" name='_method' value="PUT" /></p>
                        <div class="box box-success">
                            <div class="box-body">
                                <p><input type="text" name='idProg' value="{{ $program->id }}" /></p>
                                <input  name='idOps'  id="idopsmodif" />
                                <h4 class="card-header">L'opération</h4>
                                <p class="text-center" >
                                    <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" id="codeModif"  placeholder="Code de  l'opération" required />
                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback bg-danger">
                                                         <strong>{{ $errors->first('code') }}</strong>
                                                     </span>
                                    @endif
                                </p>
                                <p >
                                    <input type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" id="designationModif" placeholder="designation" required/>
                                    @if ($errors->has('num_prog'))
                                        <span class="invalid-feedback bg-danger">
                                                         <strong>{{ $errors->first('designation') }}</strong>
                                                     </span>
                                    @endif
                                </p>
                                <p >
                                    <textarea  class="form-control " name="observation" id="ObservationsModif" placeholder="Observations"></textarea>
                                </p>

                                <h4 class="text-capitalize">Les fréquences</h4>

                                <div class="form-group col-sm-6">
                                    <label class="text" id="">Fréquence 1 :</label>
                                    <input name="idfreq1" id="idfreq1" type="hidden"   />
                                    <input name="valFreq1" id="valFreq1Modif" type="text" required  />
                                    <input name="anc_unitefreq1" id="uniteFreq1Modif" type="text" disabled class="sm"  />
                                    <select name="new_unitefreq1"  >
                                        <option>Changez l'unité ici</option>
                                        @foreach($collectionfreq as $fre)
                                            <optgroup label="{{$fre['type']}}">
                                                @foreach( $fre['unites'] as $unite)
                                                    <option value="{{ $unite. '|' . $fre['type'] }}">{{$unite}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-groupe col-sm-6">
                                    <label class="text" id="">Fréquence 2 :&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input name="idfreq2" id="idfreq2" type="hidden"   />
                                    <input name="valFreq2" id="valFreq2Modif" type="text"  />
                                    <input name="anc_unitefreq2" id="uniteFreq2Modif" type="text" disabled   />
                                    <select  name="new_unitefreq2"  >
                                        <option>Changez l'unité ici</option>
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="newop">
                                <i class="fa fa-check">&nbsp;</i>Valider les modifications</button>
                            <button type="reset" class="btn btn-secondary pull-left" data-dismiss="modal">
                                <i class="fa fa-remove">&nbsp;</i>Annuler</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


<!-- ============================================================== -->
<!-- Formulaire du programme d'entretien -->
<!-- ============================================================== -->
        <div class="box box-primary ">
            <div class="box-header with-border">
                <h3 class="box-title">Informations du programme</h3>
            </div>

            <div class="box-body" >
                    <table class="table">
                        <tr>
                            <th> Numéro du programme : </th>
                            <th> Nom du programme : </th>
                            <th > Date d'édition : </th>
                            <th>  Document de référence :  </th>
                        </tr>
                        <form method="POST"  id="form-prog" action="{{ Route('programs.update',[$program])}}" >
                            {!! csrf_field() !!}
                            <p><input  type="hidden" name='_method' value="PUT" /></p>
                        <tr>
                            <td>
                                <input type="text"  class="form-control{{ $errors->has('num_prog') ? ' is-invalid' : '' }} col-xs-5 " name="num_prog" value="{{$program->num_prog}}">
                                @if ($errors->has('num_prog'))
                                    <span class="invalid-feedback bg-danger col-xs-5">
                                       <strong>{{ $errors->first('num_prog') }}</strong>
                                  </span>
                                @endif
                            </td>

                            <td>
                                <input type="text"  class="form-control{{ $errors->has('nom_programme') ? ' is-invalid' : '' }} col-xs-6" name="nom_programme" value="{{$program->nom_programme}}" >
                                @if ($errors->has('nom_programme'))
                                    <span class="invalid-feedback bg-danger">
                                       <strong>{{ $errors->first('nom_programme') }}</strong>
                                 </span>
                                @endif
                            </td>

                            <td>
                                <input type="text"  class="form-control{{ $errors->has('date_edition') ? ' is-invalid' : '' }} " name="date_edition" value="{{$program->date_edition}}" >
                                @if ($errors->has('date_edition'))
                                    <span class="invalid-feedback bg-danger">
                                       <strong>{{ $errors->first('date_edition') }}</strong>
                                 </span>
                                @endif
                            </td>

                            <td>
                                <input type="text" class="form-control" name="doc_ref" value="{{$program->doc_ref}}">
                            </td>

                            <td>
                                <button type="submit" class="btn btn-success pull-right " name="modifinfosProg">
                                    <i class="fa fa-check">&nbsp;</i>Valider les modifications
                                </button>
                            </td>
                        </tr>
                        </form>
                    </table>
            </div>
        </div>


        @if (isset($listops))
            <!-- ============================================================== -->
            <!-- Tableau des opérations -->
            <!-- ============================================================== -->
            <!-- Button to Open the Modal to add an operation -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Liste des opérations :&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus">&nbsp;</i>Ajouter une opération
                        </button>
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-stripped">
                            <tr>
                                <th> Code de l'opération </th>
                                <th> Designation </th>
                                <th > Périodicités </th>
                                <th>  Actions        </th>
                            </tr>
                            <tbody>
                                @foreach($listops as $ops)
                                    @php
                                    $echeances = $ops->echeances()->get();
                                    $i =1;
                                    $j = 1
                                    //Array $valfreq,$unitefreq;
                                    @endphp
                                        <tr>
                                            {{--<td> {{ $program->id }}</td>--}}
                                            <td> {{ $ops->code }}</td>
                                            <td> {{ $ops->designation }}</td>
                                            <td>
                                               @foreach($echeances as $echeance)
                                                        <li>{{$echeance->valeur .' '. $echeance->unite }}</li>
                                                @php
                                                    $idfreq[$j] = $echeance->id;
                                                   $valfreq[$j] = $echeance->valeur;
                                                   $unitefreq[$j] = $echeance->unite;
                                                    $j++;
                                                @endphp
                                                @endforeach
                                            </td>
                                            @php
                                                $idfreq[$j] = ' ';
                                                $valfreq[$j] = ' ';
                                                $unitefreq[$j] = ' ';
                                                $j=1;
                                            @endphp
                                            <td class="form-inline">
                                                <form action="{{ Route('programs.operations.destroy',['idProg'=> $program->id,'idops'=>$ops->id]) }}"
                                                      method="post"
                                                      class="d-inline-block"
                                                      >
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="button" class="btn btn-primary btn-sm "  data-myid="{{ $ops->id }}" data-mycode="{{ $ops->code }}"
                                                           data-mydes="{{ $ops->designation }}"
                                                           data-myobs="{{ $ops->observation }}"

                                                           data-myidfreq1="{{ $idfreq[1] ? $idfreq[1] : 'N/D'}}"
                                                           data-myvalfreq1="{{ $valfreq[1] ? $valfreq[1] : 'N/D'}}"
                                                           data-myunitefreq1="{{ $unitefreq[1] ? $unitefreq[1] : 'N/D' }}"

                                                           data-myidfreq2="{{ $idfreq[2] ? $idfreq[2] : ' '}}"
                                                           data-myvalfreq2="{{ $valfreq[2] ? $valfreq[2] : ' '}}"
                                                           data-myunitefreq2="{{ $unitefreq[2] ? $unitefreq[2] : ' ' }}"
                                                           data-toggle="modal" data-target="#myModalModif">
                                                        <i class="fa fa-pencil">&nbsp;</i>Modifier
                                                    </button>
                                                    <button type="submit" class=" btn btn-danger btn-sm " onclick="return confirm('Voulez-vous vraiment supprimer cette opération ?')">
                                                        <i class='fa fa-trash'>&nbsp;</i>Supprimer
                                                    </button>
                                                    <input type="hidden" name='idProg' value="{{ $program->id }}" />
                                                    <input type="hidden" name='idops' value="{{ $ops->id }}" />
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{$listops->links()}}
                </div>

             </div>
        @endif
    @endsection

@section('js')
    <script>
        $('#myModalModif').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('myid')
            var code = button.data('mycode')
            var designation = button.data('mydes')
            var obs = button.data('myobs')

            var idfrequence1 = button.data('myidfreq1')
            var valfrequence1 = button.data('myvalfreq1')
            var unitefreq1 = button.data('myunitefreq1')

            var idfrequence2 = button.data('myidfreq2')
            var valfrequence2 = button.data('myvalfreq2')
            var unitefreq2 = button.data('myunitefreq2')

            var modal = $(this)

            modal.find('.modal-body #idopsmodif').val(id)
            modal.find('.modal-body #codeModif').val(code)
            modal.find('.modal-body #designationModif').val(designation)
            modal.find('.modal-body #ObservationsModif').val(obs)

            modal.find('.modal-body #idfreq1').val(idfrequence1)
            modal.find('.modal-body #valFreq1Modif').val(valfrequence1)
            modal.find('.modal-body #uniteFreq1Modif').val(unitefreq1)

            modal.find('.modal-body #idfreq2').val(idfrequence2)
            modal.find('.modal-body #valFreq2Modif').val(valfrequence2)
            modal.find('.modal-body #uniteFreq2Modif').val(unitefreq2)

        });
    </script>
@endsection

