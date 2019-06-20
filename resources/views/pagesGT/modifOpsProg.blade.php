@extends('layouts.masterGT')
@section('content')

<!-- ============================================================== -->
<!-- Formulaire modal d'ajout d'une opération -->
<!-- ============================================================== -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Nouvelle opération</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST"  id="form-ops" action="{{ Route('programs.operations.store',['idProg'=> $idProg]) }}" >
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <p><input type="hidden" name='idProg' value="{{ $idProg }}" /></p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-header">L'opération</h5>
                                        <p >
                                            <input type="text" class="form-control" name="code" id="codeops" placeholder="Code de l'opération">
                                        </p>
                                        <p >
                                            <input type="text" class="form-control" name="designation" id="designationops" placeholder="designation">
                                        </p>
                                        <p >
                                            <textarea  class="form-control " name="observation" id="observations" placeholder="Observations"></textarea>
                                        </p>

                                        <h5 class="card-header">Les fréquences</h5>
                                        <div class="input-group form-control">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">1ère Fréquence</span>
                                            </div>
                                            <input name="valFreq1" type="text" placeholder="Entrez la valeur"  >
                                            <select  name="unitefreq1"  class="custom-select" >
                                                <option selected>-- Unité --</option>
                                                <optgroup label="Calendaire">
                                                    <option value="ans">An(s)</option>
                                                    <option value="mois">Mois</option>
                                                    <option value="jours">Jour(s)</option>
                                                </optgroup>
                                                <optgroup label="Horaire">
                                                    <option value="heures">Heures(s)</option>
                                                    <option value="minutes">Minute(s)</option>
                                                    <option value="secondes">Seconde(s)</option>
                                                </optgroup>
                                                <optgroup label="Distance">
                                                    <option value="metres">Mètre(s)</option>
                                                    <option value="kilometres">Kilomètre(s)</option>
                                                </optgroup>
                                            </select>
                                        </div>

                                        <div class="input-group form-control">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >2ème Fréquence</span>
                                            </div>
                                            <input name="valFreq2" type="text" placeholder="Entrez la valeur" >
                                            <select  name="unitefreq2"  class="custom-select" >
                                                <option selected>-- Unité --</option>
                                                <optgroup label="Calendaire">
                                                    <option value="ans">An(s)</option>
                                                    <option value="mois">Mois</option>
                                                    <option value="jours">Jour(s)</option>
                                                </optgroup>
                                                <optgroup label="Horaire">
                                                    <option value="heures">Heure(s)</option>
                                                    <option value="minutes">Minute(s)</option>
                                                    <option value="secondes">Seconde(s)</option>
                                                </optgroup>
                                                <optgroup label="Distance">
                                                    <option value="metres">Mètre(s)</option>
                                                    <option value="kilometres">Kilomètre(s)</option>
                                                </optgroup>
                                            </select>
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
<!-- Formulaire du programme d'entretien -->
<!-- ============================================================== -->
<div class="col-sm-auto " >
    <div class="card card border-info mb-3">
        <form method="POST"  id="form-prog" action="{{ Route('programs.update',['idProg'=>$idProg])}}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p><input type="hidden" name='idMat' value="{{ $idMat }}" /></p>
            <p><input type="hidden" name='idProg' value="{{ $idProg }}" /></p>
            <p><input  type="hidden" name='_method' value="PUT" /></p>

            <h4 class="card-header card border-info mb-3">Zone de modification du programme {{$numProg}}</h4>
            <div class="card-body" >
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">NUMERO DU PROGRAMME</span>
                    </div>
                    <input type="text" class="form-control" name="num_prog" id="num_prog" value="{{ $numProg }}"/>
                </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon3">NOM DU PROGRAMME</span>
                        </div>
                        <input type="text" class="form-control" name="nom_programme" id="nom_programme" value="{{ $nomProg }}"/>
                    </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">DATE D'EDITION</span>
                    </div>
                    <input type="date"  class="form-control " name="date_edition" id="date_edition" value="{{  $dateEd }}"/>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon3">DOCUMENT DE REFERENCE</span>
                    </div>
                    <input type="text" class="form-control" name="doc_ref" id="doc_ref" value="{{ $docRef }}"/>
                </div>

            </div>
            <div class="card-footer">
                <div >
                    <input id="myBtn" type="submit" class="btn btn-primary" value="Modifier le programme"/>
                    <a class="btn btn-secondary" href="{{ route('Materiels.index') }}">Retourner à la liste du matériel</a>
                </div>
            </div>
        </form>
    </div>
</div>

    <!-- ============================================================== -->
    <!-- Tableau des opérations -->
    <!-- ============================================================== -->

<div class="col-sm-auto " >
    <div class="card card border-info mb-3">
<!-- Button to Open the Modal -->
<h3 class="card-header">Liste des opérations :&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        <i >&nbsp;</i>Ajouter une opération
    </button>
</h3>
    @if (isset($listops))

        <table  class="table table-sm  dataTable text-justify">
            <thead class="thead-light">
                <tr>
                    <th> Code de l'opération </th>
                    <th> Designation </th>
                    <th> Périodicité 1 </th>
                    <th> Périodicité 2 </th>
                    <th>  </th>
                </tr>
            </thead>
            <tbody>

             @foreach($listops as $ops)

                    <tr>

                        <td> {{ $ops->code }}</td>
                        <td> {{ $ops->designation }}</td>
                        <td> {{ $ops->periodicite1 }}</td>
                        <td> {{ $ops->periodicite2 }}</td>

                        @php
                        $periodicite1 = explode(" ",$ops->periodicite1);
                        $periodicite2 = explode(" ",$ops->periodicite2);
                        @endphp
                        <td>
                        <input type="hidden" value="{{$i=1}}">

                            <input type="button" class="btn btn-primary"  data-myid="{{ $ops->id }}" data-mycode="{{ $ops->code }}"
                                   data-mydes="{{ $ops->designation }}"
                                   data-myobs="{{ $ops->observation }}"
                                    data-myvalfreq1="{{ $periodicite1[0] ? $periodicite1[0] : 'N/D'}}" data-myunitefreq1="{{ $periodicite1[1] ? $periodicite1[1] : 'N/D'}}"
                                   data-myvalfreq2="{{ $periodicite2[0] ? $periodicite2[0] : 'N/D'}}" data-myunitefreq2="{{ $periodicite2[1] ? $periodicite2[1] : 'N/D'}}"
                                    data-toggle="modal" data-target="#myModalModif"  value='Modifier'/>
                            <form action="{{ Route('programs.operations.destroy',['idProg'=> $idProg,'idops'=>$ops->id]) }}"
                                  method="post"
                                  class="d-inline-block"
                                  onclick="return confirm('Voulez-vous vraiment supprimer cette opération ?')"
                            >
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" class=" btn btn-danger" value="Supprimer"  />
                                <input type="hidden" name='idProg' value="{{ $idProg }}" />
                                <input type="hidden" name='idoperation' value="{{ $ops->id }}" />
                        </form>
                        </td>

                    </tr>


            @endforeach
            </tbody>
            </table>
        @endif

    </div>
</div>



<!-- ============================================================== -->
<!-- Formulaire modal de modification d'une opération -->
<!-- ============================================================== -->
<div class="modal fade" role="dialog" id="myModalModif" aria-labelledby="myModalModif">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Modification de l'opération</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST"  id="form-ops" action="{{ Route('programs.operations.update',['idProg'=> $idProg,'idops']) }}" >
                {!! csrf_field() !!}
                <p><input  type="hidden" name='_method' value="PUT" /></p>
                <p><input type="hidden" name='idProg' value="{{ $idProg }}" /></p>


                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-header">L'opération</h5>
                                    <input  name='idOps'  id="idopsmodif" value=""/>
                                    <p >
                                        <input type="text" class="form-control" name="code" id="codeModif" placeholder="oui"/>
                                    </p>
                                    <p >
                                        <input type="text" class="form-control" name="designation" id="designationModif" placeholder="non"/>
                                    </p>
                                    <p >
                                        <textarea  class="form-control " name="observation"  id="ObservationsModif" placeholder="vrai"></textarea>
                                    </p>

                                    <h5 class="card-header">Les fréquences</h5>
                                    <div class="input-group form-control">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >1ère Fréquence</span>
                                        </div>
                                        <input name="valFreq1" type="text" id="valFreq1Modif" placeholder="Valeur freq"  />
                                        <select  name="unitefreq1" class="custom-select" id="uniteFreq1Modif">
                                            <option selected>-- Unité --</option>
                                            <optgroup label="Calendaire">
                                                <option value="ans">An(s)</option>
                                                <option value="mois">Mois</option>
                                                <option value="jours">Jour(s)</option>
                                            </optgroup>
                                            <optgroup label="Horaire">
                                                <option value="heures">Heure(s)</option>
                                                <option value="minutes">Minute(s)</option>
                                                <option value="secondes">Seconde(s)</option>
                                            </optgroup>
                                            <optgroup label="Distance">
                                                <option value="metres">Mètre(s)</option>
                                                <option value="kilometres">Kilomètre(s)</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div class="input-group form-control">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >2ème Fréquence</span>
                                        </div>
                                        <input name="valFreq2" type="text" id="valFreq2Modif" placeholder="Valeur de la freq"/>
                                        <select  name="unitefreq2" id="uniteFreq2Modif" class="custom-select">
                                            <option selected>-- Unité --</option>
                                            <optgroup label="Calendaire">
                                                <option value="ans">An(s)</option>
                                                <option value="mois">Mois</option>
                                                <option value="jours">Jour(s)</option>
                                            </optgroup>
                                            <optgroup label="Horaire">
                                                <option value="heures">Heure(s)</option>
                                                <option value="minutes">Minute(s)</option>
                                                <option value="secondes">Seconde(s)</option>
                                            </optgroup>
                                            <optgroup label="Distance">
                                                <option value="metres">Mètre(s)</option>
                                                <option value="kilometres">Kilomètre(s)</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="modifop">Valider modifications</button>
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
$('#myModalModif').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
    var code = button.data('mycode')
    var designation = button.data('mydes')
    var valfrequence1 = button.data('myvalfreq1')
    var valfrequence2 = button.data('myvalfreq2')
    var unitefreq1 = button.data('myunitefreq1')
    var unitefreq2 = button.data('myunitefreq2')
    var id = button.data('myid')
    var obs = button.data('myobs')
var modal = $(this)
modal.find('.modal-body #codeModif').val(code)
modal.find('.modal-body #designationModif').val(designation)
modal.find('.modal-body #valFreq1Modif').val(valfrequence1)
modal.find('.modal-body #valFreq2Modif').val(valfrequence2)
modal.find('.modal-body #uniteFreq1Modif').val(unitefreq1)
modal.find('.modal-body #uniteFreq2Modif').val(unitefreq2)
modal.find('.modal-body #ObservationsModif').val(obs)
modal.find('.modal-body #idopsmodif').val(id)
});
</script>

@endsection