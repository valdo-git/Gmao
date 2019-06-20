

@extends('adminlte::page')

@section('title', 'Liste du Matériel')

@section('content_header')
    <h3 class="box-title">Liste du matériel</h3>
    <ol class="breadcrumb">
        <li><a href="{{ route('homeGT') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Liste matériel</li>
    </ol>

@stop
@section('content')
    <div class="box box-solid ">
        <div class="box-header with-border">
            <h4 class="box-title">Cliquez sur un groupe pour dérouler la liste</h4>
        </div>
        <div class="box-body ">
            <div class="box-group " id="accordion">
                <div class=" box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Engins roulants
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body grpe1">
                            @include('pagesGT.Materiel.indexMatGrpe1')
                        </div>
                    </div>
                </div>
                <div class=" box box-danger">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Equipements spéciaux
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body grpe2">
                            @include('pagesGT.Materiel.indexMatGrpe2')
                        </div>
                    </div>
                </div>
                <div class=" box box-success">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                Equipements d'entretien
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="box-body grpe3">
                            @include('pagesGT.Materiel.indexMatGrpe3')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

@section('js')
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

