<?php

namespace App\Http\Controllers;

use App\Atelier;
use App\Emplacement;
use App\Http\Requests\MaterielFormRequest;
use App\Materiel;
use Faker\Provider\tr_TR\DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class MaterielsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)//pour la gestion technique
    {
        $materiel = new Materiel();
        $materiels = $materiel->where('idgrpe',1)->paginate(3);
        $materiels2 = $materiel->where('idgrpe',2)->paginate(3);
        $materiels3 = $materiel->where('idgrpe',3)->paginate(3);

        if ($request->ajax()) {
            return [
                'html1' => view('pagesGT.Materiel.indexMatGrpe1', compact('materiels'))->render(),
                'html2' => view('pagesGT.Materiel.indexMatGrpe2', compact('materiels2'))->render(),
                'html3' => view('pagesGT.Materiel.indexMatGrpe3', compact('materiels3'))->render()
            ];
        }

        return view('pagesGT.Materiel.indexMat', compact('materiels','materiels2','materiels3'));

    }

    public function index2()//pour le germac
    {
        $materiel = new Materiel();
        $materiels = $materiel->where('idgrpe',1)->paginate(1);
        $materiels2 = $materiel->where('idgrpe',2)->paginate(1);
        $materiels3 = $materiel->where('idgrpe',3)->paginate(2);
        return view('pagesGermac.Materiel.indexMat', compact('materiels','materiels2','materiels3'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$listemp = new Emplacement();
        $listemp = Emplacement::all();
        $listatelier = Atelier::all();
        return view('pagesGT.Materiel.createMat',compact('listemp','listatelier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Materiel::find($request->idMat)
        $mat = new Materiel();
        $date = today();
        $validator = Validator::make($request->all(), [
            'numImmat' => 'nullable|unique:materiels|max:255',
            'codeProduit' => 'nullable|unique:materiels|max:255',
        ]);
        if ($validator->fails()) {
            Flashy::error('Une erreur s\'est produite, veuillez réessayer !!!');
            return back()
                ->withErrors($validator);
        }

        //champs généraux
        $mat->designation = $request->designation;
        $mat->emplacement_id = $request->emplacement_id;
        $mat->atelier_id = $request->atelier_id;
        $mat->typeMat = $request->typeMat;
        $mat->dateAcquisitionMat = $request->dateAcquisitionMat;
        $mat->disponibilite = 0;

                if ($request->idgrpe == 1 ){//engins roulants
                      $mat->numImmat = $request->numImmat;
                      $mat->kilometrageInit = $request->kilometrageInit;
                      $mat->kilometrage = $request->kilometrageInit;
                      $mat->dateMiseEnCirc = $request->dateMiseEnCirc;
                      $mat->numChassis = $request->numChassis;
                      $mat->idgrpe = 1;

                  }
                  elseif ($request->idgrpe == 2){//engins spéciaux
                      $mat->numImmat = $request->numImmat;
                      $mat->numChassis = $request->numChassis;
                      $mat->horometreInit = $request->horometreInit;
                      $mat->horometre = $request->horometreInit;
                      $mat->dateMiseEnCirc =$request->dateMiseEnCirc;;
                      $mat->idgrpe = 2;

                  }
                  elseif ($request->idgrpe == 3){//equip d'entretien
                      $mat->codeProduit = $request->codeProduit;
                      $mat->dateInstallation = $date;
                      $mat->idgrpe = 3;
                  }
              $mat->save();
              Flashy::success('Enregistrement réalisé avec succès!!!');
                return Redirect::route('Materiels.index');
           // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $mat = new Materiel();
        $mat = $mat->find($id);
        $idgrpeMat = $mat->idgrpe;
        if($idgrpeMat == 1){
            return view('pagesGT.Materiel.editMateriel1',compact('mat'));
        }
        elseif($idgrpeMat == 2){
            return view('pagesGT.Materiel.editMateriel2',compact('mat'));
        }else
            return view('pagesGT.Materiel.editMateriel3',compact('mat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $materiel = new Materiel();
        $materiel = $materiel->findOrFail($id);

        //validation du numero d'immat s'il est renseigné :: grpe1 et grpe2
        if ($request->idgrpe == 1 or $request->idgrpe == 2) {
            if($materiel->numImmat != $request->numImmat){
                 $validator = Validator::make($request->all(), [
                'numImmat' => 'required|unique:materiels|max:255',
                'dateAcquisitionMat' => 'date_format:"d-m-Y"',
                'dateMiseEnCirc' => 'date_format:"d-m-Y"',
                ]);
                if ($validator->fails()) {
                Flashy::error('Une erreur s\'est produite, veuillez réessayer !!!');
                return back()
                    ->withErrors($validator);
                }
            }
        }else //validation code prod et date
            if($materiel->codeProduit != $request->codeProduit){
                $validator = Validator::make($request->all(), [
                    'codeProduit' => 'required|unique:materiels|max:255',
                    'dateInstallation' => 'date_format:"d-m-Y"',
                ]);
            if ($validator->fails()) {
                Flashy::error('Une erreur s\'est produite, veuillez réessayer !!!');
                return back()
                    ->withErrors($validator);
            }
        }

        $validator = Validator::make($request->all(), [
            'dateAcquisitionMat' => 'date_format:"d-m-Y"',
            'dateMiseEnCirc' => 'date_format:"d-m-Y"',
            'dateInstallation' => 'date_format:"d-m-Y"',
        ]);
        if ($validator->fails()) {
            Flashy::error('Une erreur s\'est produite, veuillez réessayer !!!');
            return back()
                // return view('PagesGT.ProgOps.createOpsProg',compact('program','listops','collectionfreq'))
                ->withErrors($validator);
        }

        //champs obligatoires
        $materiel->designation = $request->designation;
        $materiel->typeMat = $request->typeMat;
        $dateAcquisitionMat = Carbon::parse($request->dateAcquisitionMat);
        $dateAcquisitionMat = $dateAcquisitionMat->format('Y-m-d');
        $materiel->dateAcquisitionMat = $dateAcquisitionMat;
        //$materiel->disponibilite = 0;//$request->disponibilite;

        if ($request->idgrpe == 1 ) {//engins roulants
            $materiel->numImmat = $request->numImmat;
            $materiel->kilometrageInit = $request->kilometrageInit;
            $materiel->kilometrage = $request->kilometrage;
            $dateMiseEnCirc = Carbon::parse($request->dateMiseEnCirc);
            $dateMiseEnCirc = $dateMiseEnCirc->format('Y-m-d');
            $materiel->dateMiseEnCirc = $dateMiseEnCirc;
            $materiel->numChassis = $request->numChassis;
            $materiel->idgrpe = 1;
        }
        elseif ($request->idgrpe == 2) {//engins spéciaux
            $materiel->numImmat = $request->numImmat;
            $materiel->numChassis = $request->numChassis;
            $materiel->horometreInit = $request->horometreInit;
            $materiel->horometre = $request->horometre;
            $dateMiseEnCirc = Carbon::parse($request->dateMiseEnCirc);
            $dateMiseEnCirc = $dateMiseEnCirc->format('Y-m-d');
            $materiel->dateMiseEnCirc = $dateMiseEnCirc;;
            $materiel->idgrpe = 2;

        } elseif ($request->idgrpe == 3){//equip d'entretien
            $materiel->codeProduit = $request->codeProduit;
            $dateInstallation = Carbon::parse($request->dateInstallation);
            $dateInstallation = $dateInstallation->format('Y-m-d');
            $materiel->dateInstallation = $dateInstallation;
            $materiel->idgrpe = 3;
        }
        $materiel->update();
        Flashy::success('Modification réalisée avec succès !!!');
        return Redirect::route('Materiels.index');

       /* if ($materiel->numImmat == $request->numImmat){
            //$mat->numImmat = $request->numImmat;
            $materiel->update();
            Flashy::success('Modification réalisée avec succès !!!');
            return Redirect::route('Materiels.index');
            }
        else {
            $numPresent = $materiel->where('numImmat', $request->numImmat)->get();
            if ($numPresent->isNotEmpty()) {
                // dd('numP existe deja');
                Flashy::error('Ce numero de programme est déjà attribué, Veuillez réessyer !!!');
                return back();
            }
            else{
                //dd('numP nexiste pas deja');
                $materiel->numImmat = $request->numImmat;
                $materiel->update();
                Flashy::success('Modification réalisée avec succès !!!');
                return Redirect::route('Materiels.index');
            }
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
