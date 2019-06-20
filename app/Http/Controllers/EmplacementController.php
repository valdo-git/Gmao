<?php

namespace App\Http\Controllers;

use App\Emplacement;
use App\Http\Requests\EmplacementFormRequest;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class EmplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listEmp = Emplacement::all()->paginate(10);
        return view('pagesGT.Emplacement.indexEmp',compact('listEmp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesGT.Emplacement.createEmp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(EmplacementFormRequest $request)
    {
        Emplacement::create([
            'designation' => $request->designation,
            'gisement' => $request->gisement,
            'observations' => $request->observations
        ]);
        Flashy::success('Enregistrement réalisé avec succès !!!');
        return redirect()->back();
    }

    public function store(EmplacementFormRequest $request)
    {
        Emplacement::create([
            'designation' => $request->designation,
            'gisement' => $request->gisement,
            'observations' => $request->observations
        ]);
        Flashy::success('Enregistrement réalisé avec succès !!!');
        return redirect()->route('Emplacements.index');
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
        $dd = new Emplacement();
        $dd = $dd->where('id',$request->idModif)->first();

        if ($dd->designation !=  $request->designation) {
            $request->validate([
                'designation' => 'unique:emplacements|max:255',
            ]);
        }
        if ($dd->gisement !=  $request->gisement){
            $request->validate([
                'gisement' => 'unique:emplacements|max:255',
            ]);
        }
        $dd->designation =  $request->designation;
        $dd->gisement =  $request->gisement;
        $dd->observations =  $request->observations;

        $dd->save();
        Flashy::success('Modification réalisée avec succès !!!');
        return redirect()->route('Emplacements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dd = new Emplacement();
        $dd = $dd->where('id',$id)->first();

        $dd->delete();
        Flashy::success('Suppression réalisée avec succès !!!');
        return redirect()->route('Emplacements.index');
    }
}
