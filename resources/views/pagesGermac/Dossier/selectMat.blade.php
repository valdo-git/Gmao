@extends('layouts.masterGT')

<title>Création d'un ordre de travail</title>

@section('content')
    <br>
    <!-- ============================================================== -->
    <!-- Formulaire sélection du matériel -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <form method="POST" class="form-horizontal" action="{{ Route('Dossiers.store')}}" enctype="multipart/form-data">
                <H4 class="scheduler-border" > Veuillez sélectionner le matériel</H4><br>
                {!! csrf_field() !!}
                <div class="form-group row">
                    <div class="col-sm-4 text-center">
                        <input type="text" class="form-control" name="num_mat" id="num_mat" placeholder="  Entrez le numero du matériel">
                    </div>
                    <div >ou</div>
                    <div class="col-sm-4 text-center">
                        <select  name="select_mat" id="select_mat" onselect="" class="custom-select"  >
                            <option>-- Selectionner le matériel --</option>

                            <optgroup label="Engins roulants">
                                @foreach($materiels1 as $mat1)
                                    <option value="{{$mat1->numImmat}}">{{$mat1->designation}}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Engins spéciaux">
                                @foreach($materiels2 as $mat2)
                                    <option value="{{$mat2->numImmat}}">{{$mat2->designation}}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Matériels d'entretien">
                                @foreach($materiels3 as $mat3)
                                    <option value="{{$mat3->codeProduit}}">{{$mat3->designation}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <input id="myBtn" type="submit" class="btn btn-primary" value="Rechercher le programme d'entretien">
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#select_mat").change(function(){
               var valSelect = $("#select_mat").val();
                $("#num_mat").val(valSelect);
            });
        });
    </script>
    @endsection