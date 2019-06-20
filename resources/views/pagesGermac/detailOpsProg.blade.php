@extends('layouts.masterGT')
@section('content')

<!-- ============================================================== -->
<!-- Formulaire d'ajout d'une opération -->
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
                                            <input type="text" class="form-control" name="code" id="code" placeholder="Code de l'opération">
                                        </p>
                                        <p >
                                            <input type="text" class="form-control" name="designation" id="designationops" placeholder="designation">
                                        </p>
                                        <p >
                                            <textarea  class="form-control " name="observation" id="observations" placeholder="Observations"></textarea>
                                        </p>

                                        <h5 class="card-header">Les fréquences</h5>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">1ère Fréquence</span>
                                            </div>
                                            <input name="valFreq1" type="text" placeholder="Entrez la valeur"  >
                                            <select   name="unitefreq1"  >
                                                <option>-- Choisir l'unité --</option>
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

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">2ème Fréquence</span>
                                            </div>
                                            <input name="valFreq2" type="text" placeholder="Entrez la valeur" >
                                            <select  name="unitefreq2"  class="custom-select" >
                                                <option selected>-- Choisir l'unité --</option>
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
        <form method="POST"  id="form-prog" action="{{ Route('programs.store')}}" >
            {!! csrf_field() !!}
            <p><input  name='idMat' value="{{ $idMat }}" /></p>
            <h4 class="card-header card border-info mb-3">Zone de saisie du proramme</h4>
            <div class="card-body" >
                <p >
                    <input type="text" class="form-control" name="num_prog" id="code" placeholder="Numero du programme">
                </p>
                <p >
                    <input type="text" class="form-control" name="nom_programme" id="designationops" placeholder="Nom du proogramme">
                </p>
                <p >
                    <input type="date"  class="form-control " name="date_edition" id="observations" placeholder="Date d'édition(JJ/MM/AAAA")>
                </p>
                <p >
                    <input type="file" class="form-control" name="doc_ref" id="doc_ref" placeholder="Document de référence">
                </p>
            </div>
            <div class="card-footer">
                <div >
                    <input id="myBtn" type="submit" class="btn btn-primary" value="Valider">
                </div>
            </div>
        </form>
    </div>
</div>

    <!-- ============================================================== -->
    <!-- Tableau des opérations -->
    <!-- ============================================================== -->


<!-- Button to Open the Modal -->
        <h3 class="card-header">Liste des opérations :&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    <i class="glyphicon-plus">&nbsp;</i>Ajouter une opération
</button>
</h3>

    @if (isset($listops))
    <div class="dataTable">
        <table id="zero_config" class="table table-sm">

            <thead class="thead-light">
                <tr>

                    <th> Désignation programme </th>

                    <th> Code de l'opération </th>
                    <th> Designation </th>
                    <th> Périodicité 1 </th>


                    <th> Périodicité 2 </th>


                    <th>         </th>
                </tr>
            </thead>
            <tbody>
             @foreach($listops as $ops)
                <form method="get" action="#">

                    <tr>

                        <td> {{ $nomProg }}</td>

                        <td> {{ $ops->code }}</td>
                        <td> {{ $ops->designation }}</td>

                        <td> {{ $idfreq1Valeur ? $idfreq1Valeur : 'N/D'}} {{ $idfreq1Unite ? $idfreq1Unite : 'N/D' }}</td>
                        <td> {{ $idfreq2Valeur ? $idfreq2Valeur : 'N/D' }} {{ $idfreq2Unite ? $idfreq2Unite : 'N/D' }}</td>

                        <td>
                            <input type='submit' class="btn btn-primary" value='Modifier'>
                            <input type='submit' class=" btn btn-danger" value='Supprimer'>
                        </td>

                    </tr>
                    <input type="hidden" name='idMat' value="{{ $ops->id }}" />
                    <br/>
                </form>
            @endforeach



            </tbody>
            </table>
        @else
            <h3 class="title">Aucune opération enregistrée</h3>
        @endif

        </div>
    </div>




@endsection