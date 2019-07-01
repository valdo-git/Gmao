 <!-- ============================================================== -->
    <!-- Formulaire modal d'ajout d'un atelier -->
    <!-- ============================================================== -->
     <div class="modal fade" id="myModalAt">
        <div class="modal-dialog" >
            <div class="modal-content">

                    <div class="modal-header ">
                        <h3 class="modal-title">Création d'atelier</h3>
                    </div>

                    <form method="POST"  id="form-ops" class="form-horizontal" action="{{ route('Ateliers.store2') }}" >
                        <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="inputNomAt" class="col-sm-3 control-label">*Nom l'atelier :</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nom_atelier"  name="nom_atelier" placeholder="*Nom de l'atelier" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputNomChiefAt" class="col-sm-3 control-label">*Grade et nom du Chef d'atelier :</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nom_chef" id="nom_chef" placeholder="*Grade et nom du Chef d'atelier" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputNomAt" class="col-sm-3 control-label">Date de création :</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="date_creation" id="date_creation">
                                            </div>
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
    <div class="box box-solid box-body">
    <div class="modal fade" id="myModalEmp">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="box-header with-border">

                    <div class="modal-header">
                        <h3 class="modal-title">Création emplacement</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST"  id="form-ops" class="form-horizontal" action="{{ route('Emplacements.store2') }}" >
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="desig" class="col-sm-3 control-label">*Désignation de l'emplacement :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="designation"  name="designation" placeholder="*Désignation de l'emplacement" required>
                                            </div>
                                        </div>


                                       <div class="form-group">
                                            <label for="gise" class="col-sm-3 control-label">*Gisement :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="gisement"  name="gisement" placeholder="*Gisement" required>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label for="observ" class="col-sm-3 control-label">*Observations:</label>
                                            <div class="col-sm-9">
                                                <textarea  class="form-control" name="observations" id="observations" >Obsevations sur l'emplacement</textarea>
                                            </div>
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
    </div>
    <!-- ============================================================== -->
    <!-- FIN Formulaire modal d'ajout d'un emplacement -->
    <!-- ============================================================== -->