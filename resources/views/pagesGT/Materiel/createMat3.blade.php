<form class="form-horizontal" method="POST" action="{{ route('Materiels.store') }}" accept-charset="UTF-8">
    {!! csrf_field() !!}

    <div class="input-group mb-3">
        <input class="form-control" name="idgrpe" type="hidden" id="idgrpe" value="3">
    </div>


    <div class="form-group">
        <label class="col-sm-2 text-right control-label" >*Atelier :  </label>
        <div class="col-sm-6">
            <select  name="atelier_id" id="atelier_id"  class="form-control{{ $errors->has('nom_atelier') ? ' is-invalid' : '' }} " required >
                @foreach($listatelier as $at)
                    <option value="{{$at->id}}">{{$at->nom_atelier}}</option>
                @endforeach
            </select>
            @if ($errors->has('nom_atelier'))
                <span class="invalid-feedback bg-danger">
                    <strong>{{ $errors->first('nom_atelier') }}</strong>
                </span>
            @endif
        </div>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModalAt" >
            <i class="fa fa-plus"></i>&nbsp; Ajouter
        </button>
    </div>

    <div class="form-group">
        <label class="col-sm-2 text-right control-label col-form-label" >Emplacement :  </label>
        <div class="col-sm-6">
            <select  name="emplacement_id" id="emplacement_id"  class="form-control"  >
                @foreach($listemp as $emp)
                    <option value="{{$emp->id}}">{{$emp->designation}}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModalEmp" >
            <i class="fa fa-plus"></i>&nbsp; Ajouter
        </button>
    </div>

    <div class="form-group">
        <label class="col-sm-2 text-right control-label col-form-label" >*Code du produit :  </label>
        <div class="col-sm-6">
            <input class="form-control{{ $errors->has('codeProduit') ? ' is-invalid' : '' }}" name="codeProduit" type="text" id="codeProduit" required>
            @if ($errors->has('codeProduit'))
                <span class="invalid-feedback bg-danger">
                      <strong>{{ $errors->first('codeProduit') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 text-right control-label col-form-label" >*Désignation :  </label>
        <div class="col-sm-6">
            <input class="form-control" name="designation" type="text" id="designation" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 text-right control-label col-form-label" >Date d'acquisition :  </label>
        <div class="col-sm-6">
            <input class="form-control" name="dateAcquisitionMat" type="date" id="dateAcquisitionMat" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 text-right control-label col-form-label" >*Date d'installation : </label>
        <div class="col-sm-6">
            <input class="form-control" name="dateInstallation" type="date" id="dateInstallation" required>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 text-right control-label col-form-label" > Type du matériel :  </label>
        <div class="col-sm-6">
            <input class="form-control" name="typeMat" type="text" id="typeMat" required>
        </div>
    </div>

    <div class="card-footer col-sm-10">
        <button class="btn btn-primary pull-right " type="submit" ><i class="fa fa-check-circle-o"></i>&nbsp; Valider l'enregistrement</button>
        <button class="btn" type="reset" ><a href="{{ route('homeGT') }}"><i class="fa fa-reddit"></i>&nbsp; Annuler l'enregistrement</a></button>
    </div>

</form>
