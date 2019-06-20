<table  class="table table-sm text-center" >

    <thead class="thead-light" >
        <tr>
            <th > Désignation </th>
            <th> Date acquisition </th>
            <th> Code produit </th>
            <th> Date installation </th>
            <th >...</th>
        </tr>
    </thead>
    <tbody>
    @foreach($materiels3 as $materiel)
        <tr>
            <td> {{ $materiel->designation }}</td>
            <td > {{ $materiel->dateAcquisitionMat }}</td>
            <td> {{ $materiel->codeProduit }}</td>
            <td> {{ $materiel->dateInstallation }}</td>
            <td >
                @include('partials.GT.materiel._dropdownButton')
            </td>
        </tr>
        <input type="hidden" name='idMat' value="{{ $materiel->id }}" />
        <input type="hidden" id='grpe' value="{{ $materiel->idgrpe }}" />
    @endforeach
    </tbody>
</table>
    {{$materiels3->links()}}








