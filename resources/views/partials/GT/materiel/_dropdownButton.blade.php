<div class="input-group-btn">
    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action
        <span class="fa fa-caret-down"></span></button>
    <ul class="dropdown-menu">
        <li> <a class="dropdown-item" href="/Materiels/{{ $materiel->id }}/edit">Modifier </a></li>
        <li class="divider"></li>
        @if($prog = \App\Materiel::find($materiel->id)->program)
            <li><a class="dropdown-item" href="{{ route('programs.operations.index',['idProg'=> $prog->id]) }}">Modifier programme</a></li>
        @else
            <li><a class="dropdown-item" href="/programs/create/?idMat={{ $materiel->id }}">Définir programme</a></li>
        @endif
    </ul>
</div>