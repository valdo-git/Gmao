@extends('adminlte::page')

@section('title', 'Matériels indisponibles')

@section('content_header')
    <h1>Liste du matériel indisponible <a href="{{ route('homeGT') }}"  class="btn btn-outline-info" >
            <i class="fa fa-arrow-left"></i> Retour à l'accueil
        </a></h1>
@stop

@section('content')

<div class="card">
    @if ($listmatIndis->isEmpty())
        <h4 class="text-center text-warning">Auncun matériel n'est indisponible. &nbsp;  </h4>
    @else

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $listmatIndis->count()}}{{str_plural(' matériel concerné',$listmatIndis->count())}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th> Désignation du matériel </th>
                <th> Numéro d'immatriculation </th>
                <th> Kilométrage </th>

            </tr>
            @php
                $i=1;
            @endphp
            @foreach($listmatIndis as $col)
                <tr>
                    <td>{{$i++}}.</td>
                    <td> {{  $col->designation  }}</td>
                    <td> {{   $col->numImmat   }}</td>
                    <td> {{   $col->kilometrage   }}</td>
                    <td>   <a class="btn btn-primary" href="/programs/create/?idMat={{ $col->id }}">Définir programme</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li>{{$listmatIndis->links()}}</li>
        </ul>
    </div>
</div>
@endif
<!-- /.box -->
</div>
@endsection