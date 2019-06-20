<?php

namespace App\Http\Controllers;

use App\Materiel;
use App\Dossier;
use App\Ordre;
use App\Program;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class AccueilGTController extends Controller
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
        $noMaterial = true;
       // $dd = $matIndispo->where('id',$request->idModif)->first();
        if ($listmat->isNotEmpty()){
            $noMaterial = false;
            foreach ($listmat as $mat ) {
                //$prog = \App\Materiel::find($mat->id)->program;
                $disponibilite = \App\Materiel::find($mat->id)->disponibilite;
                //dd($mat);
               // if(!$prog)
                if($disponibilite == 0)
                    $matIndispo++;
                }
            $ordresOuverts = $ordres->where('statut','Ouvert')->count();
            $ordresEnAtt = $ordres->where('statut','En Attente')->count();
            $dossiersOuverts = $dossiers->where('statut_dv','Ouvert')->count();
            //dd($matIndispo);
            return view('pagesGT/accueilGT',compact('matIndispo','ordresOuverts','ordresEnAtt','dossiersOuverts','noMaterial'));
        }
        else
            return view('pagesGT/accueilGT',compact('noMaterial'));
    }

    public function matindispo()
    {
       // $collection = new Collection();
        $mat = new Materiel();
        //$listmatIndis = Materiel::doesntHave('program')->paginate(8);// a chercher car tres intéressant
       $listmatIndis = $mat->where('disponibilite',0)->paginate(8);
           // dd($listmatIndis);
       /* $collection = $collection->paginate(8);
        //$nbre = $collection->count();
        if ($collection->isEmpty())
            dd($collection);
            //return view('pagesGT/listeMatIndispo');
        else
            dd($collection);*/
            return view('pagesGT/listeMatIndispo',compact('listmatIndis'));
    }

    public function OTouverts()
    {
        //dd('pour la liste des ordres de travail ouverts');
        $ordre = new Ordre();
        $program = new Program;
        $mat = new Materiel();
        $listordre = $ordre->where('statut','Ouvert')->get();
        $listordre = $listordre->paginate(8);
        $ouverts = 'ouverts';
        return view('pagesGT.Ordre.index',compact('listordre','program','mat','ouverts'));
    }

}