<?php

namespace App\Http\Controllers;

use App\Demandeur;
use App\Http\Requests\DemandeurFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use MercurySeries\Flashy\Flashy;

class DemandeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$dd = new Demandeur();
        //$listDD = $dd->all()->paginate(2);
        $listDD = Demandeur::paginate(10);
        return view('pagesGermac.Demandeur.listeDD',compact('listDD'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesGermac.Demandeur.newDD');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemandeurFormRequest $request)//pour le modal
    {
       // $dd = new Demandeur();
        $newDD = Demandeur::create([
            'nom_demandeur' => $request->nom_demandeur,
            'type_demandeur' => $request->type_demandeur
        ]);
        return redirect()->back();

    }

    public function store2(DemandeurFormRequest $request)//a partir du menu
    {
      //$dd = new Demandeur();
        $newDD = Demandeur::create([
            'nom_demandeur' => $request->nom_demandeur,
            'type_demandeur' => $request->type_demandeur
        ]);
        Flashy::success('Enregistrement réalisée avec succès !!!');
        return redirect()->route('Demandeurs.index');
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
        $dd = new Demandeur();
        $dd = $dd->where('id',$id)->first();
        return view('pagesGermac.Demandeur.editDD',compact('dd'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DemandeurFormRequest $request, $id)
    {
        $dd = new Demandeur();
        $dd = $dd->where('id',$id)->first();
        $dd->nom_demandeur =  $request->nom_demandeur;
        $dd->type_demandeur =  $request->type_demandeur;
        $dd->update();
        Flashy::success('Modification réalisée avec succès !!!');
        return redirect()->route('Demandeurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dd = new Demandeur();
        $dd = $dd->where('id',$id)->first();
        $dd->delete();
        Flashy::success('Suppression réalisée avec succès !!!');
        return redirect()->back();
    }
}
