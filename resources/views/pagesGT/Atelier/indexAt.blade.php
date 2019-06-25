@extends('adminlte::page')
@section('title')
    Liste des ateliers
    @endsection

    @section('content')
   <!-- ============================================================== -->
    <!-- Formulaire modal d'ajout d'un atelier -->
    <!-- ============================================================== -->

    <div class="box box-solid box-body">
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
                                <div class="col-sm-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <p>
                                                
                                                <input type="text" class="form-control" name="nom_atelier" id="nom_atelier" placeholder="Nom l'atelier" required>

                                            </p>                                           

                                            <p>
                                                
                                                <input type="text" class="form-control" name="nom_chef" id="nom_chef" placeholder="Grade et nom du chef d'atelier ">
                                            </p>

                                            <p>
                                                
                                                <input type="date" class="form-control" name="date_creation" id="date_creation" placeholder="Date de création ">
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
    <!-- FIN Formulaire modal d'ajout d'un atelier -->
    <!-- ============================================================== -->


    <div class="card">
        @if ($errors->has('nom_atelier') )
            @php
            MercurySeries\Flashy\Flashy::error( $errors->first('nom_atelier') );
            @endphp
        @endif
        @if ( $errors->has('nom_chef'))
                @php
                MercurySeries\Flashy\Flashy::error( $errors->first('nom_chef') );
                @endphp
            @endif
 <h4 class="card-header">Liste des ateliers :&nbsp;
     <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#myModalAt" >
         <i class="fa fa-plus"></i> Ajouter un atelier
     </button>

 </h4>
 @if ($listatelier->isEmpty())
     <h4 class="text-center text-warning">Auncun atelier n'est enregistré. &nbsp;  </h4>
 @else

     <div class="dataTable ">
         <table id="zero_config" class="table table-sm text-center">

             <thead class="thead-light">
             <tr>

                 <th> Nom de l'atelier </th>
                 <th> Date de création </th>
                 <th> Grade et Nom du chef d'atelier </th>
                 <th> </th>

             </tr>
             </thead>
             <tbody class="text-center">
             @foreach($listatelier as $at)
                 <tr>
                     <td> {{  $at->nom_atelier  }}</td>
                     <td> {{   $at->date_creation   }}</td>
                     <td> {{   $at->nom_chef   }}</td>

                     <td>
                     {{-- <a href="{{Route('Ateliers.edit',$at)}}" class="btn btn-primary btn-sm">Modifier</a>--}}
                         <input type="button" class="btn btn-primary btn-sm"
                                data-myid="{{ $at->id }}"
                                data-myname="{{ $at->nom_atelier }}"
                                data-mycreateddate="{{ $at->date_creation }}"
                                data-mychiefname="{{ $at->nom_chef }}"
                         data-toggle="modal" data-target="#myModalModifAt"  value='Modifier'/>


                         @if ($at->materiels()->get()->isNotEmpty())
                             <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Impossible de supprimer cet atelier">
                                 <button class="btn btn-danger btn-sm" style="pointer-events: none;"  disabled>Supprimer</button>
                             </span>
                         @else
                             <form action="{{ Route('Ateliers.destroy',$at) }}"
                                   method="post"
                                   class="d-inline-block"
                                   onclick="return confirm('Voulez-vous vraiment supprimer cet atelier ?')">
                                 {{csrf_field()}}
                                 {{method_field('DELETE')}}
                                 <input type="submit" class=" btn btn-danger btn-sm" value="Supprimer"/>
                                 {{-- <input type="hidden" name='idExp' value="{{ $exp->id }}" /> --}}
                             </form>
                         @endif

                     </td>

                 </tr>


             @endforeach

             </tbody>

         </table>
     </div>
     {{$listatelier->links()}}
 @endif

</div>

<!-- ============================================================== -->
<!-- Formulaire modal de modif d'un atelier -->
<!-- ============================================================== -->

<div class="box box-solid box-body">
    <div class="modal fade" id="myModalModifAt" role="dialog" aria-labelledby="myModalModifAt">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Modification atelier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST"  id="form-ops" action="{{ route('Ateliers.update','idAt') }}" >
                    {!! csrf_field() !!}
                    <p><input  type="hidden" name='_method' value="PUT" /></p>

                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-8 card card-body">
                                
                                    
                                <p><input  type="hidden"  name="idModif" id="idModif" /></p>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon3">Nom de l'atelier : </span>
                                    </div>
                                    <input type="text"  class="form-control" name="nom_atelier" id="nomatelierModif" />
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon3">Nom du chef d'atelier : </span>
                                    </div>

                                    <select  name="nom_chef"  id="nom_chef" onselect="" class="custom-select " required >
                                        @foreach($listeChefAt as $chef)
                                        <option value="{{$chef->grade.' '.$chef->name}}">{{$chef->grade}} {{$chef->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon3">Date de création enregistrée: </span>
                                            </div>
                                            <input type="text" class="form-control" name="date_creation_p" id="datecreationModif" placeholder="oui"/>
                                        </div>

                                <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon3">Nouvelle date : </span>
                                            </div>
                                            <input type="date" class="form-control" name="date_creation_n" />
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

</div>
@endsection
@section('scripts')
<script>
 $('#myModalModifAt').on('show.bs.modal', function (event) {
     var button = $(event.relatedTarget) // Button that triggered the modal
     var id = button.data('myid')
     var name = button.data('myname')
     var valdateCrea = button.data('mycreateddate')
     var valchiefName = button.data('mychiefname')
     var modal = $(this)
     modal.find('.modal-body #idModif').val(id)
     modal.find('.modal-body #nomatelierModif').val(name)
     modal.find('.modal-body #datecreationModif').val(valdateCrea)
     modal.find('.modal-body #nomchefModif').val(valchiefName)
 });
</script>
@endsection