@extends('layouts.masterChefAt')

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
                    <button class="btn btn-link btn-outline-primary " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Engins roulants
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body grpe1" >
                    @include('pageschefAt.indexMatGrpe1')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Equipements spéciaux
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" data-mygrpe=1>
                <div class="card-body grpe2">
                    @include('pageschefAt.indexMatGrpe2')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link btn-outline-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" data-mygrpe=2>
                       Equipements d'entretien
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" data-mygrpe=3>
                <div class="card-body grpe3">
                    @include('pageschefAt.indexMatGrpe3')
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">

        $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;"src="/public/img/insiBaa1.JPG" />');

                var url = $(this).attr('href');

                //var grpe = $(this).attr('href');
                var grpe =$('.grpe3').val();

                getArticles(url,grpe1);
                window.history.pushState("", "", url);
            });

            function getArticles(url,grpe) {
                $.ajax({
                    url : url,
                    grpe : grpe

                }).done(function (data) {
                    $('.grpe1').html(data.html1);
                    $('.grpe2').html(data.html2);
                    $('.grpe3').html(data.html3);
                    //load(url, grpe)


                }).fail(function () {
                    alert('Materials could not be loaded.',grpe);
                });
            }
        });
    </script>
@endsection

