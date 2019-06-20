<?php

namespace App\Http\Controllers;

use App\Atelier;
use App\Http\Requests\AtelierFormRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class AtelierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$atelier = new Atelier();
        $listatelier = Atelier::all()->paginate(10);
        $listeChefAt = DB::table('users')
            ->where([
                ['role_id', 3],
                ['statut','like','chef atelier'],
            ])
            ->get();
        return view('pagesGT.Atelier.indexAt',compact('listatelier','listeChefAt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $listeChefAt = DB::table('users')
            ->where([
                ['role_id', 3],
                    ['statut','like','chef atelier'],
                ])
            ->get();
       return view('pagesGT.Atelier.createAtelier',compact('listeChefAt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(AtelierFormRequest $request)
    {
        Atelier::create([
            'nom_atelier' => $request->nom_atelier,
            'date_creation' => $request->date_creation,
            'nom_chef' => $request->nom_chef
        ]);
        Flashy::success('Enregistrement réalisé avec succès!!!');
        return redirect()->route('Ateliers.index');
    }

    public function store2(AtelierFormRequest $request)//Le modal
    {
        Atelier::create([
            'nom_atelier' => $request->nom_atelier,
            'date_creation' => $request->date_creation,
            'nom_chef' => $request->nom_chef
        ]);
        return redirect()->back();
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

        $dd = new Atelier();
        $dd = $dd->where('id',$request->idModif)->first();

       if ($dd->nom_atelier !=  $request->nom_atelier){
           $request->validate([
               'nom_atelier' => 'unique:ateliers|max:255',
           ]);
       }
        if ($dd->nom_chef !=  $request->nom_chef){
            $request->validate([
                'nom_chef' => 'unique:ateliers|max:255',
            ]);
        }
        $dd->nom_chef =  $request->nom_chef;
        $dd->nom_atelier =  $request->nom_atelier;
        $dd->date_creation = Carbon::parse($request->date_creation_p)->format('Y-m-d');
        if (!is_null( $request->date_creation_n) and ($request->date_creation_n != $request->date_creation_p) )
            $dd->date_creation = $request->date_creation_n;
        $dd->save();
        Flashy::success('Modification réalisée avec succès !!!');
        return redirect()->route('Ateliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dd = new Atelier();
        $dd = $dd->where('id',$id)->first();

        $dd->delete();
        Flashy::success('Suppression réalisée avec succès !!!');
        return redirect()->route('Ateliers.index');
    }
}
