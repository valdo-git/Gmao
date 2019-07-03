<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Operation;
use App\Ordre;
use App\Program;
use Illuminate\Http\Request;
use App\Materiel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;


class OrdreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('pour la liste des ordres de travail en attente');
        $ordre = new Ordre();
        $program = new Program;
        $mat = new Materiel();
        $listordre = $ordre->where('statut','En Attente')->get();
        $attente = 'en Attente';
        $listordre =  $listordre->paginate();
        return view('pagesGT.Ordre.index',compact('listordre','program','mat','attente'));
    }
    
    public function indexDV(Request $request)
    {
        //dd('pour la liste des ordres de travail liés à un DV, au niv du germac');
        $ordre = new Ordre();
        $dossier = new Dossier();
        $mat = new Materiel();
        $program = new Program();

        $dossier =  $dossier->where('id',$request->DvId)->first();
        $numDossier =  $dossier->numero;
        $listOT_Ouverts = $ordre
            ->where('statut','Ouvert')
            ->where('dossier_id',$dossier->id)
            ->get();
        $listordre = $listOT_Ouverts;
        $titre ='ouverts';

        $listOT_Fermes = $ordre
            ->where('statut','Fermés')
            ->where('dossier_id',$dossier->id)
            ->get();

        if($request->OT_fermes == 'true'){
            $listordre = $listOT_Fermes;
            $titre ='fermés';
    }
        $listordre = $listordre->paginate(10);

        return view('pagesGermac.Ordre.indexOTDV',compact('listordre','dossier','titre','numDossier'));
    }

    public function selectMat()
    {
        $materiel = new Materiel();
        $materiels1 = $materiel->where('idgrpe',1)->get();
        $materiels2 = $materiel->where('idgrpe',2)->get();
        $materiels3 = $materiel->where('idgrpe',3)->get();
        return view('pagesGT.Ordre.selectMat',compact('materiels1','materiels2','materiels3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      //  dd('affichage formulaire ot et liste ops selon choix mat');
        $materiel = new Materiel();
        $program = new Program();
            $mat = $materiel->Where('numImmat',$request->select_mat)
            ->orWhere('codeProduit', $request->num_mat)
            ->get();
        if ($mat->isNotEmpty()){
            $matid = $mat->first()->id;
            $prog =  $program->Where('materiel_id',$matid)->first();
            if ($prog ) {//and $request->num_mat != 'Veuillez sélectionner un matériel' ) {
                $listops = $prog->operations()->get();
                return view('pagesGT.Ordre.createOrdre',compact('listops'));
            }else{
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
    public function store(Request $request)
    {

        // Récupération des opérations sélectionnées
        $tabops = $request->input('operations');
        //dd($tabops);
        if($tabops){
            $id_une_op = $tabops[0];
            $idprog = Operation::find($id_une_op)->program_id;
            $prog = Program::find($idprog);
           //dd( $request->input('date_creation'));
            $listops = $prog->operations()->get();

        $validator = Validator::make($request->all(), [
            'numero' => 'required|unique:ordres|max:255',
            'date_creation' => 'date_format:"Y-m-d"',
        ]);

        if ($validator->fails()) {
            Flashy::error('Une erreur s\'est produite, veuillez réessayer !!!');
            return back()
            //return view('pagesGT.Ordre.createOrdre',compact('listops'))
                ->withErrors($validator);
        }

        //création de l'ordre
        $ordre = new Ordre();
        $ordre->numero = $request->numero;
        $ordre->description = $request->description;
        $ordre->date_creation = $request->date_creation;
        $ordre->statut = 'En Attente';
        $ordre->save();

        //création des cartes de travail
        foreach ($tabops as $ops) {
            $numCarte = 'Carte '. $ordre->numero.$ops;
            $ordre->operations()->attach($ops, array('numero' => $numCarte),$ordre->id);
        }
        Flashy::success('Ordre de travail créé avec succès !!!');
        return redirect( route('Ordres.index'));
        }
        else{
            Flashy::error('Vous devez sélectionner au moins une opération !!!');
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
        //selection des operations qui ont pour l'ordre $id
       // $id_ops = DB::table('cartes')->select('operation_id')->where('ordre_id', $id)->get();

       // dd($id_ops);

        $ordreToModify = Ordre::find($id);
        $uneops = $ordreToModify->operations()->first();
        $listOpOt = $ordreToModify->operations()->get();
        $idprog = Operation::find($uneops->id)->program_id;
        //dd($idprog);
        $prog = Program::find($idprog);
        $listops = $prog->operations()->get();

        return view('pagesGT.Ordre.editOrdre',compact('listops','ordreToModify', 'listOpOt'));

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
        // Récupération des opérations sélectionnées
            $tabops = $request->input('operations');
            $ordreAmodif =  Ordre::find($id);

        if($tabops) {
            $id_une_op = $tabops[0];
            $idprog = Operation::find($id_une_op)->program_id;
            $prog = Program::find($idprog);
            //dd( $request->input('date_creation'));
            $listops = $prog->operations()->get();

            $validator = Validator::make($request->all(), [
                'date_creation' => 'date_format:"d-m-Y"',
            ]);

            if ($ordreAmodif->numero !=  $request->numero)
                $validator = Validator::make($request->all(), [
                    'numero' => 'required|unique:ordres|max:255',
                    'date_creation' => 'date_format:"d-m-Y"',
                ]);
            if ($validator->fails()) {
                Flashy::error('Une erreur s\'est produite, veuillez réessayer !!!');
                return back()
                    //return view('pagesGT.Ordre.createOrdre',compact('listops'))
                    ->withErrors($validator);
            }

            //dd($ordreAmodif->operations());
            $ordreAmodif->numero = $request->numero;
            $ordreAmodif->description = $request->description;
            $date_creation = Carbon::parse($request->date_creation);
            $date_creation = $date_creation->format('Y-m-d');
            $ordreAmodif->date_creation = $date_creation;
            $ordreAmodif->statut = 'En Attente';
            $ordreAmodif->update();
            // $managementUnit->councils()->where('id', 1)->wherePivot('year', 2011)->detach(1);
            //$ordreAmodif->operations()->where('id', $id)->detach();
            $ordreAmodif->operations()->detach();
            //maj des cartes de travail
            foreach ($tabops as $ops) {
                $numCarte = 'Carte ' . $ordreAmodif->numero . $ops;
                $ordreAmodif->operations()->attach($ops, array('numero' => $numCarte), $ordreAmodif->id);
            }
            Flashy::success('Ordre de travail modifié avec succès !!!');
            return redirect(Route('Ordres.index'));
        }
        else{
            Flashy::error('Vous devez sélectionner au moins une opération !!!');
            return back();
        }

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
        $ordre = new Ordre();

        $ordreAmodif = $ordre->find($id);
        //dd($ordreAmodif);
        $ordreAmodif->operations()->detach();
      //  dd('cest détaché');
        $ordreAmodif->delete();
        Flashy::success('Suppression réalisée avec succès !!!');
        return redirect(Route('Ordres.index'));

    }
}
