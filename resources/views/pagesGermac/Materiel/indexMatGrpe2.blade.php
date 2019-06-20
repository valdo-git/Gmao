

<table id="zero_config" class="table table-sm text-center">

    <thead class="table-light " >
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
                <div class="btn-group dropup" role="group" >
                    <button  class="btn btn-outline-info  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                        <li> <a class="dropdown-item" href="/Materiels/{{ $materiel->id }}/edit">Modifier </a></li>
                    </ul>
                </div>

            </td>


        </tr>
        <input type="hidden" name='idMat' value="{{ $materiel->id }}" />
    @endforeach
    </tbody>
</table>
        <div align="center" >
            {{$materiels2->links()}}
        </div>



