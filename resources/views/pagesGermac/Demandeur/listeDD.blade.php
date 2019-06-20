@extends('layouts.masterGermac')
@section('title')
    Liste des demandeurs
@endsection
@section('content')

        <!-- ============================================================== -->
    <!-- Formulaire modal d'ajout d'un demandeur -->
    <!-- ============================================================== -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Nouveau demandeur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST"  id="form-ops" action="{{ route('Demandeurs.store') }}" >
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm">
                                <div class="card">
                                    <div class="card-body">
                                        <p >
                                            <input type="text" class="form-control" name="nom_demandeur" id="nom_demandeur" placeholder="Nom du demandeur">
                                        </p>
                                        <p >
                                            <input type="text" class="form-control" name="type_demandeur" id="type_demandeur" placeholder="Type de demandeur">
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

    <div class="card">

        <h4 class="card-header">Liste des demandeurs :&nbsp;
            <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#myModal" >
                <i class="fa fa-plus"></i> Ajouter un demandeur
            </button>
        </h4>
        @if ($listDD->isEmpty())
            <h4 class="text-center text-warning">Auncun demandeur n'est enregistré. &nbsp;  </h4>
        @else

            <div class="dataTable ">
                <table id="zero_config" class="table table-sm text-center">

                    <thead class="thead-light">
                    <tr>

                        <th> Nom du demandeur </th>
                        <th> Type du demandeur </th>
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($listDD as $dd)
                        <tr>
                            <td> {{  $dd->nom_demandeur  }}</td>
                            <td> {{   $dd->type_demandeur   }}</td>

                            <td>
                                <a href="{{Route('Demandeurs.edit',$dd)}}" class="btn btn-primary btn-sm">Modifier</a>
                                @if ($dd->exploitations()->get()->isNotEmpty())
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Impossible de supprimer ce demandeur">
                                        <button class="btn btn-danger btn-sm" style="pointer-events: none;"  disabled>Supprimer</button>
                                    </span>
                                @else
                                    <form action="{{ Route('Demandeurs.destroy',$dd) }}"
                                          method="post"
                                          class="d-inline-block"
                                          onclick="return confirm('Voulez-vous vraiment supprimer ce demandeur ?')">
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
            {{$listDD->links()}}
        @endif

    </div>


@endsection