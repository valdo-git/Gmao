<?php

namespace App\Http\Controllers;

use App\Echeance;
use App\Http\Requests\ProgramFormRequest;
use App\Materiel;
use App\Operation;
use App\Program;
use App\TypeEcheance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idMat = $request->idMat;
        return view('pagesGT.ProgOps.createProg')->with('idMat',$idMat);
        //return redirect( route('programs.operations.index',['idMat'=> $request->idMat]) );
    }

    public function preStore(ProgramFormRequest $request)// pour pré-enregistrer les infos du prog d'entretien
    {
        $prog = new Program();
        $idprog =  $prog::All()->max('id')+1;
        if (isset($request->date_edition))
            $date_edition = $request->date_edition;
        else
            $date_edition = today();
            $date_edition = Carbon::parse($date_edition);
            $date_edition = $date_edition->format('d-m-Y');
            $collection = collect([
                'num_prog' =>  $request->num_prog,
                'nom_programme' => $request->nom_programme,
                //'age' => $request->nom_programme,
                'date_edition' => $date_edition,
                'doc_ref' => $request->doc_ref,
                'materiel_id' => $request->idMat,
                'idProg' => $idprog

            ]);
        $collection->toArray();
        $collectionfreq = createCollectionTypeUnitFrequences();
       // $collectionfreq->get();
        //dd($collectionfreq);
           // Flashy::success('Enregistrement réalisé avec succès !!!');
            return view( 'pagesGT.ProgOps.createProg2',compact('collection','collectionfreq'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramFormRequest $request)
    {
        $prog = new Program();
        $ops = new Operation();
        $freq1 = new Echeance();
        $mat = new Materiel();

        ///// ENREGISTREMENT DES INFOS PROGRAMME
        $prog->materiel_id = $request->idMat;
        $prog->num_prog = $request->num_prog;
        $prog->nom_programme = $request->nom_programme;
        //$date_edition = $request->date_edition;
        $date_edition = Carbon::parse($request->date_edition);
        $date_edition = $date_edition->format('Y-m-d');
        $prog->date_edition = $date_edition;
        $prog->doc_ref = $request->doc_ref;
        $prog->save();

        $idProg =  $prog::All()->max('id');

        /// mise à jour de la disponibilité du matériel git add le 21/06/2019
        $mat = $mat->find($prog->materiel_id);
        $mat->disponibilite = 1;
        $mat->update();

        /// faire attention et penser à vérifier que le matériel n'est pas

        ////ENREGISTREMENT DE L'OPERATION 1
        $ops->code = $request->code;
        $ops->designation = $request->designation;
        $ops->observation = $request->observation;
        $ops->program_id = $idProg;
        $ops->save();

        $idOps =  $ops::All()->max('id');

        ///ENREGRISTREMENT DES ECHEANCES
        $unitefreq1type = explode("|", $request->unitefreq1);
        $unitefreq1 = $unitefreq1type[0];
        $typefreq1 = $unitefreq1type[1];
        $freq1->valeur = $request->valFreq1;
        $freq1->unite = $unitefreq1;
        $freq1->typeEcheance = $typefreq1;
        $freq1->operation_id = $idOps;
        $freq1->save();

        if (isset($request->valFreq2) and isset($request->unitefreq2)) {
            $freq2 = new Echeance();
            $unitefreq2type = explode("|", $request->unitefreq2);
            $unitefreq2 = $unitefreq2type[0];
            $typefreq2 = $unitefreq2type[1];
            $freq2->valeur = $request->valFreq2;
            $freq2->unite = $unitefreq2;
            $freq2->typeEcheance = $typefreq2;
            $freq2->operation_id = $idOps;
            $freq2->save();
        }

       // $listops = $prog->find($idProg)->operations()->get();

        //Flashy::success('Enregistrement réalisé avec succès !!!');
        //return view( 'pagesGT.ProgOps.createOpsProg',compact('idProg','listops'));
        //return redirect( route('programs.operations.index',['idProg'=> $prog->id]) );
        return redirect( route('programs.operations.index',compact('idProg') ));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // dd($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //dd('on est en mode modif du prog',$program);
            $idMat = $program->materiel_id;//identifiant du matériel
            $nomProg = $program->nom_programme;//désignation du programme
            $numProg = $program->num_prog;//numero du programme
            $dateEd = $program->date_edition;//date d'edition du programme
            $docRef = $program->doc_ref;//doc de ref du programme
            $listops = $program ->operations->all();// liste des opérations du programme
        return redirect( route('programs.operations.index',compact('idProg') ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Program $program)
    {
        //dd($input = Input::all(),$program->id);
        $listops = $program->operations()->get();// liste des opérations du programme
        $listops =  $listops->paginate(5);
        $collectionfreq = createCollectionTypeUnitFrequences();

        if ($program->num_prog !=  $request->num_prog) {
            $validator = Validator::make($request->all(), [
                'num_prog' => 'required|unique:programs|max:255',
            ]);
            if ($validator->fails()) {
                Flashy::error('Ce numero de programme existe déjà, veuillez réessayer  !!!');
                return view('pagesGT.ProgOps.createOpsProg',compact('program','listops','collectionfreq'))
                ->withErrors($validator);
            }
        }
        else{
            $validator = Validator::make($request->all(), [
                'nom_programme' => 'required|max:255',
                'date_edition' => 'date_format:"d-m-Y"',
            ]);
            if ($validator->fails()) {
                Flashy::error('Une erreur s\'est produite, veuillez réessayer  !!!');
                return view('pagesGT.ProgOps.createOpsProg',compact('program','listops','collectionfreq'))
                    ->withErrors($validator);
            }
        }

        $date_edition = Carbon::parse($request->date_edition);
        $date_edition = $date_edition->format('Y-m-d');

        $program->numProg = $request->num_prog;
        $program->nom_programme = $request->nom_programme;
        $program->date_edition = $request->date_edition;
        $program->doc_ref = $request->doc_ref;
        //$listops = $program ->operations->all();// liste des opérations du programme

        Flashy::Success('Informations modifiées avec succès !!!');
        return view('pagesGT.ProgOps.createOpsProg',compact('program','listops','collectionfreq'));



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
