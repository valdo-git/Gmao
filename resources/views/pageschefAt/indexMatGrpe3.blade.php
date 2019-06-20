<table id="zero_config" class="table table-sm text-center">

    <thead class="table-light" >
    <tr>
        <th > Désignation </th>
        <th> Date acquisition </th>
        <th> Code produit </th>
        <th> Date installation </th>

    </tr>
    </thead>
    <tbody>
    @foreach($materiels3 as $materiel)
        <tr>
            <td> {{ $materiel->designation }}</td>
            <td > {{ $materiel->dateAcquisitionMat }}</td>
            <td> {{ $materiel->codeProduit }}</td>
            <td> {{ $materiel->dateInstallation }}</td>

        </tr>
        <input type="hidden" name='idMat' value="{{ $materiel->id }}" />
        <input type="hidden" id='grpe' value="{{ $materiel->idgrpe }}" />
    @endforeach
    </tbody>
</table>
<div >
    {{$materiels3->links()}}
</div>







