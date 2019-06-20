<div class="col-sm-auto">
    <div class="card">
        <form method="POST"  id="form-ops" action="{{ Route('programs.operations.store',['idProg'=> $idProg]) }}" >
            <h4 class="card-header">Zone de saisie</h4>
            <div class="card-body" >
                {!! csrf_field() !!}
                <p><input type="hidden" name='idProg' value="{{ $idProg }}" /></p>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">L'opération</h5>
                                    <p >
                                        <input type="text" class="form-control" name="code" id="code" placeholder="Code de l'opération">
                                    </p>
                                    <p >
                                        <input type="text" class="form-control" name="designation" id="designationops" placeholder="designation">
                                    </p>
                                    <p >
                                        <textarea  class="form-control " name="observation" id="observations" placeholder="Observations"></textarea>
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- les fréquences --}}
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">les fréquences</h5>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Valeur et unité</span>
                                        </div>
                                        <input name="valFreq1" type="text" >
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
                                            <span class="input-group-text" id="">Valeur et unité</span>
                                        </div>
                                        <input name="valFreq2" type="text" >
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

            </div>
            <div class="card-footer">
                <div >
                    <input id="myBtn" type="submit" class="btn btn-primary" value="Valider">
                </div>
            </div>
        </form>
    </div>

</div>