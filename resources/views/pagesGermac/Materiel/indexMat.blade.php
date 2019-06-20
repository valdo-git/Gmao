@extends('layouts.masterGermac')

<title>Liste materiel</title>

@section('titre_page')
    Liste du Matériel
@endsection
@section('sous_titre')
    Déroulez une liste pour voir le détail
@endsection

@section('content')
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Engins roulants
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    @include('pagesGermac.Materiel.indexMatGrpe1')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Equipements spéciaux
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    @include('pagesGermac.Materiel.indexMatGrpe2')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                       Equipements d'entretien
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    @include('pagesGermac.Materiel.indexMatGrpe3')
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p class="text-justify text-light"> &copy; Juillet-2018</p>
                </div>
                <div class="col-sm-6 text-right text-light">
                    <p>Designed by <a href="" class="text-light">berics3@yahoo.fr</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection