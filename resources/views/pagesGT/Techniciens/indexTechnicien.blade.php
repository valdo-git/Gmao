@extends('layouts.masterGT')
@section('title')
    Liste des techniciens
    @endsection

    @section('content')


    <div class="card">
      {{--  @if ($errors->has('nom_atelier'))
            @php
            MercurySeries\Flashy\Flashy::error( $errors->first('nom_atelier') )
            @endphp
        @endif--}}

        <h4 class="card-header">Liste des techniciens :&nbsp;
            <a href="{{route('Techniciens.create')}}" type="button" class="btn btn-outline-primary "  >
                <i class="fa fa-plus"></i> Ajouter un technicien
            </a>

        </h4>
        @if ($listeTech->isEmpty())
            <h4 class="text-center text-warning">Auncun technicien n'est enregistré. &nbsp;  </h4>
        @else

            <div class="dataTable ">
                <table id="zero_config" class="table table-sm text-center">

                    <thead class="thead-light">
                    <tr>

                        <th> Grade et nom du technicien </th>
                        <th> Statut </th>
                        <th> Qualification </th>
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($listeTech as $at)
                        <tr>
                            <td> {{  $at->grade.' '. $at->name}} </td>
                            <td> {{   $at->statut   }}</td>
                            <td> {{   $at->qualification   }}</td>

                            <td>
                               <a href="{{Route('Techniciens.edit',$at)}}" class="btn btn-primary btn-sm">Modifier</a>

                                    <form action="{{ Route('Techniciens.destroy',$at) }}"
                                          method="post"
                                          class="d-inline-block"
                                          onclick="return confirm('Voulez-vous vraiment supprimer ce technicien ?')">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" class=" btn btn-danger btn-sm" value="Supprimer"/>
                                        {{-- <input type="hidden" name='idExp' value="{{ $exp->id }}" /> --}}
                                    </form>

                            </td>

                        </tr>


                    @endforeach

                    </tbody>

                </table>
            </div>
            {{$listeTech->links()}}
        @endif

    </div>




@endsection