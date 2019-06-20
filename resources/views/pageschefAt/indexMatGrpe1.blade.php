

<table  class="table table-sm text-center" id="load" style="position: relative;">
       <thead class="thead-light" >
           <tr>
             <th scope="col"> Immatriculation </th>
             <th > Désignation </th>
             <th> Date acquisition </th>
             <th > Mise en circulation </th>
             <th > Numéro chassis </th>
             <th> Kilométrage initial </th>
             <th> Kilométrage actuel </th>

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


           </tr>
           <input type="hidden" name='idMat' value="{{ $materiel->id }}" />
           <input type="hidden" id='grpe1' value="{{ $materiel->idgrpe }}" />
       @endforeach
       </tbody>

</table>

<tfoot >
{{$materiels->links()}}
</tfoot>

