<?php

namespace App\Http\Controllers;

use App\Atelier;
use App\Http\Requests\AtelierFormRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MercurySeries\Flashy\Flashy;

class TechnicienController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        //$listeTech = User::all()->paginate(10);
        $listeTech = $user->where([
            ['role_id', 3],
            //['statut','like','chef atelier'],
        ])->get()->paginate(10);
        return view('pagesGT.Techniciens.indexTechnicien',compact('listeTech'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesGT.Techniciens.createTechnicien');//auth/register avec le code le role 3 fixé
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
       $user = new User();
        $grade_nom_tech = explode(" ", $request->grade_nom_tech);
        $nom = $grade_nom_tech[1];
        $grade = $grade_nom_tech[0];
        $listeTech = User::where([
            ['role_id', 3],
            ['name','like',$nom],
        ])->get();

            if($listeTech->isEmpty()){
                $user->name = $nom;
                $user->email = 'techno'.$nom.'@sygmac.ci';
                $user->role_id = 3;
                $user->grade = $grade;
                $user->qualification = $request->qualification;
                $user->statut = $request->statut;
                $user->password = Hash::make('techno'.$request->name);
                $user->save();
                Flashy::success('Enregistrement réalisé avec succès!!!');
            }else
                Flashy::error('Erreur !!!');
        return redirect()->route('Techniciens.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Tech = DB::table('users')
            ->where([
                ['role_id', 3],
                ['id',$id],
            ])
            ->first();
        return view('pagesGT.Techniciens.detailTechnicien',compact('Tech'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tech = DB::table('users')
            ->where([
                ['role_id', 3],
                ['id',$id],
            ])
            ->first();
        return view('pagesGT.Techniciens.detailTechnicien',compact('Tech'));//register avec des champs grisés
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
      /*  $dd = new User();
        $dd = $dd->where('id',$id)->first();

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
        return redirect()->route('Ateliers.index');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $dd = new Atelier();
        $dd = $dd->where('id',$id)->first();

        $dd->delete();
        Flashy::success('Suppression réalisée avec succès !!!');
        return redirect()->route('Ateliers.index');*/
    }
}
