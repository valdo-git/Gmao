
                  
        <div class="box  box-solid box-primary">
            <div class ="box-header with-border bg-light-blue-gradient" ><h4 class="box-title">Informations du dossier de visite :&nbsp;&nbsp;&nbsp;&nbsp;</h4> </div>
            <div class ="box-body" >
              <div class="form-group row">
                            <label for="num_ordre" class="col-sm-3 text-right control-label col-form-label">Numero :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control {{ $errors->has('numero') ? 'is-invalid' : ''}}" name="numero" id="numero" placeholder="Numero du dossier de visite" value="{{ old('numero') ?? $dossierV->numero }}">
                                {!! $errors->first('numero','<div class="invalid-feedback">:message</div>') !!}
                            </div>
               </div>
              <div class="form-group row">
                            <label for="designation" class="col-sm-3 text-right control-label col-form-label">Désignation :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control {{ $errors->has('designation') ? 'is-invalid' : ''}}" name="designation" id="designation" placeholder="Désignation" value="{{ old('designation') ?? $dossierV->designation }}">
                                {!! $errors->first('designation', '<div class="invalid-feedback">:message</div>')!!}
                            </div>
                        </div>
              <div class="form-group row">
                            <label for="date_ouverture" class="col-sm-3 text-right control-label col-form-label">Date d'ouverture :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control date-inputmask {{ $errors->has('date_ouverture') ? 'is-invalid' : ''}}" name="date_ouverture" id="date_ouverture" placeholder="JJ/MM/AAAA" value="{{$dossierV->date_ouverture }}">
                                {!! $errors->first('date_ouverture', '<div class="invalid-feedback">:message</div>')!!}
                            </div>
                        </div>
              <div class="form-group row">
                            <label for="date_fermeture" class="col-sm-3 text-right control-label col-form-label">Date de ferméture :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control date-inputmask {{ $errors->has('date_fermeture') ? 'is-invalid' : '' }}" name="date_fermeture" id="date_fermeture" placeholder="JJ/MM/AAAA" value="{{$dossierV->date_fermeture }}">
                                {!! $errors->first('date_fermeture', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
            </div>
     <!-- ============================================================== -->
     <!-- Liste des ordres de travail en attente du matériel -->
     <!-- ============================================================== -->
            <div class="box box-solid ">
                <div class ="box-header bg-light-blue-gradient" ><h4 class="box-title">Choix des ordres de travail :&nbsp;&nbsp;&nbsp;&nbsp;</h4> </div>
                    <div class="box-body">

                        @if (isset($collectionOrdreMat))

                            <table  class="table table-striped condensed">

                                        <thead >
                                            <tr>
                                                <th> Numero de l'ordre de travail </th>
                                                <th> Description de l'ordre </th>
                                                <th> Date de création </th>
                                                <th> Nombre d'opération </th>
                                                <th>Matériel concerné </th>
                                                <th>         </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            
                                            @foreach($collectionOrdreMat as $ordre)
                                                <tr>
                                                    <td> {{   $ordre->numero  }}</td>
                                                    <td> {{   $ordre->description   }}</td>
                                                    <td> {{   $ordre->date_creation   }}</td>
                                                    <td> <a href="{{route('Dossiers.listOpDeOrdre', ['id' => $ordre->id, 'numero'=>$ordre->numero,'num_mat' => $nuMat, 'buttonText' => $buttonText, 'idDV' => $dossierV->id])}}">{{$ordre->operations()->count()}}</a></td>
                                                    <td>{{ $matDesig }}</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="ordres[]" value="{{$ordre->id}}" class="custom-control-input" id="customCheck{{$ordre->id}}" 
                                                                @if($buttonText == 'Modifier le dossier'){
                                                                    @if($ordre->dossier_id)
                                                                        {{'checked'}}
                                                                    @else
                                                                    {{''}}
                                                                    @endif
                                                                @endif
                                                                <label class="custom-control-label" for="customCheck{{$ordre->id}}"></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                        
                    </div>
                        @endif
                </div>
            
        <!-- ============================================================== -->
        <!-- bouton de soumission du formulaire -->
        <!-- ============================================================== -->
        <div class="box-footer">
            <button type="reset" class="btn btn-default pull-left"><i class="fa fa-remove">&nbsp;</i>Annuler</button>
            <button  id="myBtn" type="submit" class="btn btn-primary pull-right">
                <i class="fa fa-check">&nbsp;</i>{{$buttonText}}</button>
        </div>
    </div>
    
