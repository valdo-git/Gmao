@extends('adminlte::page')

@section('title', 'Recherche programme')

@section('content_header')

@stop

@section('content')
    <!-- ============================================================== -->
    <!-- Formulaire sélection du matériel -->
    <!-- ============================================================== -->
    <div class="box box-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('homeGT') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Sélection matériel</li>
        </ol>
        <div class="box-header with-border">
            <H4 class="box-title" > Veuillez sélectionner un matériel</H4>

        </div>

        <div class="box-body">
            <div class="box-body" >
                <form method="get" class="form-horizontal" action="{{ Route('Dossiers.create')}}" enctype="multipart/form-data">

                    <table class="table">

                        <tr>
                            <td>
                                <input type="text" class="form-control col-sm-8" name="num_mat" id="num_mat" placeholder="  Entrez le numero du matériel"/>
                            </td>
                            <td> <input type="text" class="form-control text-center" placeholder="OU" disabled/></td>
                            <td>

                                <select  name="select_mat" id="select_mat" onselect=""  class="form-control"  >
                                    <optgroup >

                                    <option>-- Selectionner un matériel --</option>
                                    </optgroup> 

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
                            </td>
                            <td >
                                <button type="submit" class="btn btn-primary " id="myBtn" >
                                    <i class="fa fa-arrow-circle-o-right">&nbsp;</i>Créer un dossier de visite pour ce matériel
                                </button>
                            </td>
                        </tr>
                    </table>
            </form>
        </div>
    </div>

@endsection





