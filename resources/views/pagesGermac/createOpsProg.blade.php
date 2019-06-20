@extends('layouts.masterGT')
@section('content')



<!-- ============================================================== -->
<!-- Formulaire du programme d'entretien -->
<!-- ============================================================== -->
<div class="col-sm-auto " >
    <div class="card card border-info mb-3">
        <form method="POST"  id="form-prog" action="{{ Route('programs.store')}}" >
            {!! csrf_field() !!}
            <p><input  type="text" name='idMat' value="{{ $idMat }}" /></p>
            <h4 class="card-header card border-info mb-3">Zone de saisie du proramme</h4>
            <div class="card-body" >
                <p >
                    <input type="text" class="form-control" name="num_prog" id="code" placeholder="Numero du programme">
                </p>
                <p >
                    <input type="text" class="form-control" name="nom_programme" id="designationops" placeholder="Nom du proogramme">
                </p>
                <p >
                    <input type="date"  class="form-control " name="date_edition" id="observations" placeholder="Date d'édition(JJ/MM/AAAA")>
                </p>
                <p >
                    <input type="file" class="form-control" name="doc_ref" id="doc_ref" placeholder="Document de référence">
                </p>
            </div>
            <div class="card-footer">
                <div >
                    <input id="myBtn" type="submit" class="btn btn-primary" value="Valider">
                </div>
            </div>
        </form>
    </div>
</div>




@endsection