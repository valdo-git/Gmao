<?php

namespace App\Http\Controllers;

use App\Echeance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Program;
use App\Materiel;
use App\Operation;
use MercurySeries\Flashy\Flashy;

class ProgramsOperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $program = new Program();
        $mat = new Materiel();
        $program =  $program->find($id);
        $idProg = $id;
        $listops = $program->operations()->get();// liste des opérations du programme
        $listops =  $listops->paginate(5);
        $collectionfreq = createCollectionTypeUnitFrequences();//la collection des frequences et des unités
       // Flashy::Success('Opération enregistrée avec succès !!!');
        return view('pagesGT.ProgOps.createOpsProg',compact('program','listops','collectionfreq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('bienvenue a la création dune ops');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //dd($id);
        $program = new Program();
        $idProg = $id;
        $program =  $program->find($id);
       /* $listops = $program->operations()->get();// liste des opérations du programme
        $listops =  $listops->paginate(5);*/
        $collectionfreq = createCollectionTypeUnitFrequences();
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:operations|max:255',
            'designation' => 'required',
            'valFreq1' => 'required',

        ]);
        if ($validator->fails()) {
            Flashy::error('Une erreur s\'est produite, veuillez réessayer  !!!');
            return back()//view('PagesGT.ProgOps.createOpsProg',compact('program','listops','collectionfreq'))
                //->withErrors($validator);
               ->withErrors($validator);
              //  ->withInput();
        }

        ////ENREGISTREMENT DE L'OPERATION
        $ops = new Operation();
        $ops->code = $request->code;
        $ops->designation = $request->designation;
        $ops->observation = $request->observation;
        $ops->program_id =  $id;
        $ops->save();

        $idOps =  $ops::All()->max('id');

        ///ENREGRISTREMENT DES ECHEANCES
        $freq1 = new Echeance();
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
        $listops = $program->operations()->get();// liste des opérations du programme
        $listops =  $listops->paginate(5);
        Flashy::Success('Opération enregistrée avec succès !!!');
        return view('pagesGT.ProgOps.createOpsProg',compact('program','listops','collectionfreq'));
           // return redirect( route('programs.operations.index',['idProg'=> $id]) );

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
        //
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
        $program = new Program();
        $op = new Operation();
        $op = $op->find($request->idOps);
        $program =  $program->find($id);
        $idProg = $id;
       // $listops = $program->operations()->get();// liste des opérations du programme
       // $listops =  $listops->paginate(5);
        $collectionfreq = createCollectionTypeUnitFrequences();


        if ($op->code !=  $request->code) {

           $validator = Validator::make($request->all(), [
                 'code' => 'unique:operations|max:255',
                 'designation' => 'required',
                 'valFreq1' => 'required',

             ]);
            if ($validator->fails()) {
               // $listops =  $listops->paginate(5);
                Flashy::error('Une erreur s\'est produite, veuillez réessayer  !!!');
                return back()//view('PagesGT.ProgOps.createOpsProg',compact('idProg','listops','collectionfreq'))
                    //->withErrors($validator);
                    ->withErrors($validator);
                //  ->withInput();
            }

        }


        /// maj table operation
        $op->code = $request->code;
        $op->designation = $request->designation;
        $op->observation = $request->observation;
        $op->update();

        //maj table echeance
        $echeance1 = new Echeance();
        $echeance1 = $echeance1->find($request->idfreq1);
        $echeance1->valeur = $request->valFreq1;
        if(isset($request->new_unitefreq1) and ($request->new_unitefreq1 != 'Changez l\'unité ici') ){
            $new_unitefreq1 = explode("|", $request->new_unitefreq1);
            $unitefreq1 = $new_unitefreq1[0];
            $typefreq1 = $new_unitefreq1[1];
            $echeance1->unite = $unitefreq1;
            $echeance1->typeEcheance = $typefreq1;
        }
        $echeance1->save();

        if (isset($request->valFreq2) ) {
            $echeance2 = new Echeance();
            $echeance2 = $echeance2->find($request->idfreq2);
            if ($echeance2){
                $echeance2->valeur = $request->valFreq2;
                $echeance2->save();
            }
            elseif(isset($request->new_unitefreq2)and ($request->new_unitefreq2 != 'Changez l\'unité ici')) {
                $echeance2 = new Echeance();
                $new_unitefreq2 = explode("|", $request->new_unitefreq2);
                $echeance2->valeur = $request->valFreq2;
                $echeance2->unite =$new_unitefreq2[0];
                $echeance2->typeEcheance = $new_unitefreq2[1];
               $echeance2->operation_id = $request->idOps;
                $echeance2->save();
            }
            else{
                Flashy::error('Une erreur s\'est produite, veuillez réessayer  !!!');
                return back();
            }
        }
        Flashy::Success('Modification effectuée avec succès !!!');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       //dd('on est bien en suppression',$id,$request->idops);
        //$id est l'id du programme
        $ops = new Operation();
        $ops = $ops->find($request->idops);
        $idprog = $id;

        //suppression des echeances de cette ops
        $echeances = $ops->echeances()->get();
        foreach($echeances as $echeance){
            Echeance::destroy($echeance->id);
        }
        Operation::destroy($request->idops);
        Flashy::success('Suppression réalisée avec succès !!!');
        return back();
        //return redirect( route('programs.operations.index',['idProg'=> $idprog]) );
    }
}
