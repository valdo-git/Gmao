<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Materiel;
use App\Ordre;
use App\Operation;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Carbon;
use App\Http\Requests\DossierFormRequest;
use Illuminate\Support\Facades\DB;
use PDF;


class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $carbon =new Carbon();
        $listDV = new Dossier();
       // $listDV = $listDV->paginate(10);
        $listDV_ouverts = $listDV->where('statut_dv','Ouvert')->get();
        $listDV_fermes = $listDV->where('statut_dv','Fermés')->get();

        $listDV = $listDV_ouverts;
        $statut ='ouverts';

        if ($request->DV_fermes == 'true'){
            $listDV = $listDV_fermes;
            $statut ='fermés';
        }

        $listDV = $listDV->paginate(10);

       /* if($request->operateur == 'GT')
            return view('pagesGT.Dossier.indexDV',compact('listDV','statut'));
        else
            return view('pagesGermac.Dossier.indexDV',compact('listDV','statut'));*/
        return view('pagesGT.Dossier.listDV',compact('listDV','statut'));
    }

    public function selectMat()
    {
        $materiel = new Materiel;

        $materiels1 = $materiel->where('idgrpe',1)->get();

        $materiels2 = $materiel->where('idgrpe',2)->get();

        $materiels3 = $materiel->where('idgrpe',3)->get();

        
        return view('pagesGT.Dossier.selectMatDossier',compact('materiels1','materiels2','materiels3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dossierV = new Dossier();
        $ordre = new Ordre();
        $materiel = new Materiel();
        $program = new Program();
       $collectionOrdreMat = new Collection();

        //On vérifie les champs ont été renseignés
        if(empty($request->select_mat) && empty($request->num_mat)){
            Flashy::error('Veuillez saisir un code produit, un numéro d\'immatriculation ou selectionner un materiel!!!');
                    return back();
        }

        if(!empty($request->select_mat) && !empty($request->num_mat)){
            Flashy::error('Veuillez saisir une seule valeur !!!');
            return back();
        }

        if (!empty($request->select_mat) && empty($request->num_mat)) {
            $nuMat = $request->select_mat;
            }
        elseif (empty($request->select_mat) && !empty($request->num_mat)) {
            $nuMat = $request->num_mat;
        }

        // on retrouve le matériel choisi
       $mat = $materiel->Where('numImmat',$nuMat)
            ->orWhere('codeProduit',$nuMat)
            ->get();

        if ($mat->isNotEmpty()) 
        {
            $matid = $mat->first()->id;
            $matDesig = $mat->first()->designation;

            //on retrouve le prog lié à ce matériel
            $progdemat = $program->Where('materiel_id', $matid)
                ->first();
                
            if ($progdemat) 
            {
                    $idprogdemat = $progdemat->id;

                    //on retrouve tous les ordres en attente
                    $listordre = $ordre->where('statut', 'En Attente')->get();

                    //on recupere les operations liees au programme

                    //dd($operationsProg = Operation::where('program_id',$idprogdemat)->get());

                    //on recupere la premiere op de chaque ordre
                    
                    if ($listordre->isNotEmpty()) {
                        foreach ($listordre as $ordre) {
                            if ($ordre->operations()->first()->program_id == $idprogdemat)
                                //$ordre->operations()->first()->program_id;
                                $collectionOrdreMat->push($ordre);
                            //$matDesign = $program->where
                        }
                        //Ajout de isEmpy à la place de is_null
                        if ($collectionOrdreMat->isEmpty()) {
                            Flashy::error('Désolé il n\'y a aucun ordre de travail en attente pour ce matériel!!!');
                            return back();
                        } else 
                            //dd($collectionOrdreMat);

                            return view('pagesGT.Dossier.createDossier', compact('collectionOrdreMat', 'matDesig', 'nuMat', 'dossierV'));
                    } else {
                        Flashy::error('Désolé il n\'ya aucun ordre de travail en attente !!!');
                        return back();
                    }
            }
        
             else{
                    Flashy::error('Désolé ce matériel n\'a pas de programme d\'entretien !!!');
                    return back();
                }
        }
        else{
                Flashy::error('Désolé ce matériel n\'existe pas !!!');
                return back();
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DossierFormRequest $request)
    {
        //
        // Récupération des ot sélectionnées ;
        //dd($selectedOrders = $request->input('ordres'));

        $dossier = new Dossier();
        $dossier->numero = $request->numero;
        $dossier->designation = $request->designation;
        $dossier->date_ouverture = $request->date_ouverture;
        $dossier->date_fermeture = $request->date_fermeture;
        $dossier->statut_dv = 'Ouvert';


        $ordre = new Ordre();
        // Récupération des ordres sélectionnées
        $selectedOrders = $request->input('ordres');
        //dd($tabops);
        if($selectedOrders){
            $dossier->save();
            //maj des champs dossier_id ds oT sélectionnés
            foreach ($selectedOrders as $orderId) {
                $ordre = $ordre->find($orderId);//->get()
               // dd($ordre);
                $ordre->statut = 'Ouvert';
                $ordre->dossier_id = $dossier->id;
                $ordre->update();
            }
            Flashy::success('Dossier de visite créé avec succès !!!');
            /*Envoyer un message aux utilisateurs leur avertissant qu'un dossier vient d'être créé
            $users = User::where('statut', 'op_gt')->get();
            \Mail::to()->send();
            */
            //$dv = $dossier;
            $lisOT = $dossier->ordres()->get();

            return view('pagesGT.Dossier.showDv', compact('dossier', 'lisOT'));
        }
        else{
            Flashy::error('Vous devez sélectionner au moins un ordre de travail !!!');
             return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dossier = Dossier::findOrFail($id);
        //dd($dv);
        $lisOT = $dossier->ordres()->get();
        return view('pagesGT/Dossier.showDv', compact('dossier', 'lisOT'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dossierV = Dossier::find($id);//->get();
        $collectionOrdreMat = new Collection;
       
        $ordresDos= Dossier::find($id)->ordres;
        
        $operation = Ordre::find($ordresDos[0]->id)->operations()->get();
        $idPgrme = $operation[0]->program_id;
        $operationsPgme = Program::find($idPgrme)->operations()->get();
        //dd($ordresOperations);
        foreach ($operationsPgme as $operationPgme) {
            foreach ($operationPgme->ordres as $ordresOps) {
                if ($ordresOps)
                $collectionOrdreMat->push($ordresOps);
            }
        }
        
        $mat = Program::find($idPgrme)->materiel()->get();
        $nuMat = $mat[0]->id;
        $matDesig = $mat[0]->designation;
        return view('pagesGT.Dossier.editDV', compact('dossierV','matDesig', 'nuMat', 'collectionOrdreMat'));
        
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
        $dv = Dossier::findOrFail($id);
        $listOrdresDv = Ordre::where('dossier_id', $id)->get();
        $idOrdresSelect = $request->ordres;
        foreach ($listOrdresDv as $ordreDv) {
            $ordreDv->dossier_id = NULL;
            $ordreDv->statut = 'En Attente';
            $ordreDv->save();
        }
        
        foreach ($idOrdresSelect as $idOrdre) {
            DB::table('ordres')->where('id', $idOrdre)
            ->update(['dossier_id'=>$dv->id,
                        'statut'=>'Ouvert']);
            
        }
        $dv->update(['numero'=>$request->numero,
                    'designation'=>$request->designation,
                    'date_ouverture'=>$request->date_ouverture,
                    'date_fermeture'=>$request->date_fermeture
                ]);
        Flashy::success('Dossier modifié avec succès !!!');
             return redirect(route('Dossiers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ordre::where('dossier_id', $id)->update(['dossier_id'=>Null, 'statut'=>'En Attente']);
        Dossier::destroy($id);
        return redirect(route('Dossiers.index'));
    }

    public function infoTraitement(Request $request){
        $numeroDv = $request->numeroDv;
        $numerOrdre = $request->numerOrdre;
        $id = $request->id;
        $operations = Ordre::find($id)->operations;
        $pgrme = Program::where('id', $operations[0]->program_id)->first();
        //dd($pgrmes);
        //$pgrme =$pgrmes[0];
        $materiel = Program::find($pgrme->id)->materiel;
         //dd($materiel);
        return view('pagesGT.Dossier.traitement', compact('numeroDv', 'numerOrdre', 'operations', 'pgrme', 'materiel'));
    }

    public function listOpDeOrdre(Request $request)
        {
            $idOrdre = $request->id;
            $numero = $request->numero;
            $num_mat = $request->num_mat;
            $buttonText = $request->buttonText;
            $id = $request->idDV;


        if($idOrdre){

            $operations = Ordre::find($idOrdre)->operations()->get();

            return view('pagesGT.Dossier.operationsOrdre', compact('operations', 'num_mat', 'numero', 'buttonText', 'id'));
        }
    }

    public function pdfCreator($idDv){
        $numeroDv = Dossier::where('id', $idDv)->get(['numero']);
        $ordresDv = Ordre::where('dossier_id', $idDv)->get();
        //dd($ordresDv);  
            $pdf = PDF::loadView('pdf/ordrePdf', compact('numeroDv', 'ordresDv'));
            $name = "Dossier".$idDv.".pdf";
            return $pdf->download($name);
    }

}
