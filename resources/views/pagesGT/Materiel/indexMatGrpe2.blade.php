

<table  class="table table-sm text-center" >

    <thead class="thead-light " >
        <tr>
            <th > Désignation </th>
            <th> Date acquisition </th>
            <th> Immatriculation </th>
            <th > Numéro chassis </th>
            <th > Mise en circulation </th>
            <th> Horomètre actuel </th>
            <th> Horomètre initial </th>
            <th >...</th>

        </tr>
    </thead>

    <tbody>
    @foreach($materiels2 as $materiel)
        <tr>
            <td> {{ $materiel->designation }}</td>
            <td> {{ $materiel->dateAcquisitionMat }}</td>
            <td> {{ $materiel->numImmat }}</td>
            <td> {{ $materiel->numChassis }}</td>
            <td> {{ $materiel->dateMiseEnCirc }}</td>
            <td> {{ $materiel->horometre }}</td>
            <td> {{ $materiel->horometreInit  }}</td>
            <td >
                @include('partials.GT.materiel._dropdownButton')
            </td>
        </tr>
        <input type="hidden" name='idMat' value="{{ $materiel->id }}" />
        <input type="hidden" id='grpe2' value="{{ $materiel->idgrpe }}" />
    @endforeach
    </tbody>
</table>

            {{$materiels2->links()}}




