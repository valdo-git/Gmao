@extends('adminlte::page')
@section('title')
    Liste des emplacements
    @endsection

    @section('content')
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


    <div class="card">

        <h4 class="card-header">Liste des emplacemnts :&nbsp;
            <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#myModalEmp" >
                <i class="fa fa-plus"></i> Ajouter un emplacement
            </button>

        </h4>

        @if ($errors->has('designation'))
            @php
          MercurySeries\Flashy\Flashy::error( $errors->first('designation') )
            @endphp
        @endif
        @if ($errors->has('gisement'))
            @php
            MercurySeries\Flashy\Flashy::error( $errors->first('gisement') )
            @endphp
        @endif

        @if ($listEmp->isEmpty())
            <h4 class="text-center text-warning">Auncun emplacement enregistré. &nbsp;  </h4>
        @else

            <div class="dataTable ">
                <table id="zero_config" class="table table-sm text-center">

                    <thead class="thead-light">
                    <tr>

                        <th> Désignation de l'emplacement </th>
                        <th> Gisement </th>
                        <th> Observations </th>
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($listEmp as $em)
                        <tr>
                            <td> {{  $em->designation  }}</td>
                            <td> {{   $em->gisement   }}</td>
                            <td> {{   $em->observations   }}</td>

                            <td>
                               {{-- <a href="{{Route('Ateliers.edit',$at)}}" class="btn btn-primary btn-sm">Modifier</a>--}}
                                <form action="{{ Route('Emplacements.destroy',$em) }}"
                                      class="d-inline-block"
                                      method="post">

                                <input type="button" class="btn btn-primary btn-sm"
                                       data-myid="{{ $em->id }}"
                                       data-mydes="{{ $em->designation }}"
                                       data-mygisement="{{ $em->gisement }}"
                                       data-myobs="{{ $em->observations }}"
                                data-toggle="modal" data-target="#myModalModifEmp"  value='Modifier'/>

                                @if ($em->materiels()->get()->isNotEmpty())
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Impossible de supprimer cet emplacement">
                                        <button class="btn btn-danger btn-sm" style="pointer-events: none;"  disabled> <i class="icon ion-android-delete"></i> Supprimer</button>
                                    </span>
                                @else

                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Voulez-vous vraiment supprimer cet atelier ?')">
                                             <i class="icon ion-android-delete"></i> Supprimer
                                        </button>
                                        {{-- <input type="hidden" name='idExp' value="{{ $exp->id }}" /> --}}
                                    </form>
                                @endif

                            </td>

                        </tr>


                    @endforeach

                    </tbody>

                </table>
            </div>
            {{$listEmp->links()}}
        @endif

    </div>

    <!-- ============================================================== -->
    <!-- Formulaire modal de modif d'un emplacement -->
    <!-- ============================================================== -->
    <div class="modal fade" id="myModalModifEmp" role="dialog" aria-labelledby="myModalModifEmp">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">Modification Emplacement</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST"  id="form-ops" class="form-horizontal" action="{{ route('Emplacements.update','idAt') }}" >
                        {!! csrf_field() !!}
                        <p><input  type="hidden" name='_method' value="PUT" /></p>

                    <div class="modal-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-body">

                                            <p><input  type="hidden"  name="idModif" id="idModif" /></p>

                                            <div class="form-group">
                                                <label for="inputDes" class="col-sm-3 control-label">*Désignation :</label>
                                                <div class="col-sm-8">
                                                    <input type="text"  class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" id="desModif" placeholder="Désignation" />
                                                </div>
                                            </div>
                                        

                                            <div class="form-group">
                                                <label for="inputGise" class="col-sm-3 control-label">*Gisement :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="gisement" id="gisementModif"  placeholder="Gisement" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputObs" class="col-sm-3 control-label">*Observations :</label>
                                                <div class="col-sm-8">
                                                    <textarea  class="form-control" id="obsModif" name="observations" >Observations

                                                    </textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="newop">Valider les modifications</button>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
    <!-- ============================================================== -->
    <!-- FIN Formulaire modal de modif d'un atelier -->
    <!-- ============================================================== -->


@endsection
@section('js')
    <script>
        $('#myModalModifEmp').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('myid')
            var des = button.data('mydes')
            var gisement = button.data('mygisement')
            var obs = button.data('myobs')
            var modal = $(this)
            modal.find('.modal-body #idModif').val(id)
            modal.find('.modal-body #desModif').val(des)
            modal.find('.modal-body #gisementModif').val(gisement)
            modal.find('.modal-body #obsModif').val(obs)
        });
    </script>
@endsection