<?php

namespace App\Http\Controllers;

use App\Materiel;
use App\Dossier;
use App\Ordre;
use App\Program;
use Illuminate\Support\Collection;


class AccueilGermacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $matIndispo =0;

        $listmat = Materiel::all();
        $listprog = Program::all();
        $ordres = new Ordre();
        $dossiers = new Dossier();
       // $dd = $matIndispo->where('id',$request->idModif)->first();
        foreach ($listmat as $mat ) {
            $prog = \App\Materiel::find($mat->id)->program;
            //dd($mat);
            if(!$prog)
                $matIndispo++;
            }
        $ordresOuverts = $ordres->where('statut','Ouvert')->count();
        $ordresEnAtt = $ordres->where('statut','En Attente')->count();
        $dossiersOuverts = $dossiers->where('statut_dv','Ouvert')->count();
        return view('pagesGermac/accueilGermac',compact('matIndispo','ordresOuverts','ordresEnAtt','dossiersOuverts'));
    }

    public function matindispo()
    {
        $matIndispo =0;
        $i = 0;
        $collection = new Collection();

        $listmat = Materiel::all();
        $listprog = Program::all();
        // $dd = $matIndispo->where('id',$request->idModif)->first();

        foreach ($listmat as $mat ) {
            $prog = \App\Materiel::find($mat->id)->program;
         
            if(!$prog){
                $collection ->push($mat);
            }
        }
        $collection->paginate(5);
        $nbre = $collection->count();
      

        return view('pagesGT/listeMatIndispo',compact('collection','nbre'));
    }

    public function OTouverts()
    {
        //dd('pour la liste des ordres de travail en attente');
        $ordre = new Ordre();
        $program = new Program;
        $mat = new Materiel();
        $listordre = $ordre->where('statut','Ouvert')->get();
        $ouverts = 'ouverts';
        return view('pagesGT.Ordre.index',compact('listordre','program','mat','ouverts'));
    }

}