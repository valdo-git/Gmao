

<table id="zero_config" id="madatatable" class="table table-sm text-center">
       <thead class="thead-light" >
           <tr>
             <th scope="col"> Immatriculation </th>
             <th > Désignation </th>
             <th> Date acquisition </th>
             <th > Mise en circulation </th>
             <th > Numéro chassis </th>
             <th> Kilométrage initial </th>
             <th> Kilométrage actuel </th>
             <th >...</th>
           </tr>
       </thead>

       <tbody>
       @foreach($materiels as $materiel)
           <tr>
               <td > {{ $materiel->numImmat }}</td>
               <td> {{  $materiel->designation }}</td>
               <td> {{ $materiel->dateAcquisitionMat }}</td>
               <td> {{ $materiel->dateMiseEnCirc }}</td>
               <td> {{ $materiel->numChassis }}</td>
               <td> {{ $materiel->kilometrageInit }}</td>
               <td> {{ $materiel->kilometrage }}</td>

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

<tfoot >
{{$materiels->links()}}
</tfoot>

