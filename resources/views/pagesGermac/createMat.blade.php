
@extends('layouts.masterGT')

<title>Nouveau materiel</title>

@section('titre_page')
    Enregistrement Matériel
@endsection

@section('sous_titre')
    Sélectionnez le type de matériel à enregistrer
@endsection

@section('content')
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Engin roulant
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('Materiels.store') }}" accept-charset="UTF-8">
                        {!! csrf_field() !!}

                        <div class="input-group mb-3">
                            <input class="form-control" name="idgrpe" type="hidden" id="idgrpe" value="1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Immatriculation : </span>
                            </div>
                            <input class="form-control" name="numImmat" type="text" id="numImmat">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Désignation : </span>
                            </div>
                            <input class="form-control" name="designation" type="text" id="designation">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Kilométrage initial : </span>
                            </div>
                            <input class="form-control" name="kilometrageInit" type="text" id="kilometrageInit">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Numéro de chassis : </span>
                            </div>
                            <input class="form-control" name="numChassis" type="text" id="numChassis">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Date d'acquisition : </span>
                            </div>
                            <input class="form-control" name="dateAcquisitionMat" type="date" id="dateAcquisitionMat">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3"> Date mise en circulation :</span>
                            </div>
                            <input class="form-control" name="dateMiseEnCirc" type="date" id="dateMiseEnCirc" >
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3"> Type du matériel :</span>
                            </div>
                            <input class="form-control" name="typeMat" type="text" id="typeMat">
                        </div>


                        <input class="btn btn-primary " type="submit" name="engR" value="Valider">

                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Equipement spécial
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('Materiels.store') }}" accept-charset="UTF-8">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input name="idgrpe" type="hidden" id="idgrpe" value="2">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Immatriculation : </span>
                            </div>
                            <input class="form-control" name="numImmat" type="text" id="numImmat">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Désignation : </span>
                            </div>
                            <input class="form-control" name="designation" type="text" id="designation">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text " id="basic-addon3">Horometre initial : </span>
                            </div>
                            <input name="horometreInit" class="form-control" type="text" id="horometreInit">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text " id="basic-addon3">Numero de chassis : </span>
                            </div>
                            <input class="form-control" name="numChassis" type="text" id="numChassis">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Date d'acquisition : </span>
                            </div>
                            <input class="form-control" name="dateAcquisitionMat" type="date" id="dateAcquisitionMat">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3"> Type du matériel :</span>
                            </div>
                            <input class="form-control" name="typeMat" type="text" id="typeMat">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn-primary" name="engSp" value="Valider">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Equipement d'entretien
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('Materiels.store') }}" accept-charset="UTF-8">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <input name="idgrpe" type="hidden" id="idgrpe" value="3">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Code du produit :  </span>
                            </div>
                            <input name="codeProduit"  class="form-control" type="text" id="codeProduit">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Désignation : </span>
                            </div>
                            <input class="form-control" name="designation" type="text" id="designation">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Date d'acquisition : </span>
                            </div>
                            <input class="form-control" name="dateAcquisitionMat" type="date" id="dateAcquisitionMat">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">Date d'installation :</span>
                            </div>
                            <input name="dateInstallation" class="form-control" type="date" id="dateInstallation">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3"> Type du matériel :</span>
                            </div>
                            <input class="form-control" name="typeMat" type="text" id="typeMat">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="equip" value=" Valider ">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection










