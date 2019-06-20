<?php

namespace App\Http\Controllers;

use App\User;
use App\Exploitation;

use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('liste tous les utilisateurs ');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dd = new Demandeur();
        $materiel = new Materiel();
        $listdd = $dd->all();
        $imMat = $request->select_mat;
        //récupération des infos du matos
        $materiel = $materiel->where('numImmat',$imMat)
            ->orWhere('codeProduit',$imMat)
            ->first();
        $idMat = $materiel->id;
        return view('pagesGermac.Exploitation.createExp',compact('imMat','listdd','idMat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //to show a user profile
        $user = new User();
        $user = $user->find($id);
        return view('pagesGT.Profil.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new User();
        $noUser = true;
        $user = $user->where('id',$id)->first();
        //pour la vue
        if (is_null($user->id))
            return view('pagesGT.Profil.edit',compact('user','noUser'));
        else{
            $noUser = false;
            return view('pagesGT.Profil.edit',compact('user','noUser'));
        }
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
        $user = new User();
        $user = $user->where('id',$id)->first();
        $user->grade =  $request->grade;
        $user->name =  $request->name;
        $user->email =  $request->email;
        $user->qualification =  $request->qualification;
        $user->matricule =  $request->matricule;
        $user->statut =  $request->statut;
        $user->update();
        Flashy::success('Modification réalisée avec succès !!!');
        return redirect()->route('User.show',['user' => $user]);

        /*return redirect()->
        route('Exploitations.indexMat',[
            'listExp' => $listExp,
            'select_mat' => $select_mat,
            'idMat' => $idMat,
            'materiel' => $materiel
        ]);*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exploitation = new Exploitation();
        $exp = $exploitation->where('id',$id)->first();
        $materiel = $exp->materiel()->first();

        //pour la vue
        if (is_null($materiel->numImmat))            // pour mettre le num du matos
            $select_mat = $materiel->codeProduit;
        else
            $select_mat = $materiel->numImmat;
        $idMat = $materiel->id;

        $exp->delete();
        $listExp = $materiel->exploitations()->get();//liste des exp

        //phase de maj de la val km ou horo du matériel concerné ** a réécrire sous forme de méthode
        $maxReleve = $listExp->max('releve_tableau');

        if ($materiel->idgrpe == 1 ){
            $materiel->kilometrage = $maxReleve;
        }elseif($materiel->idgrpe == 2 )
            $materiel->horometre = $maxReleve;
        $materiel->update();//maj du km ou horo du matos **

        Flashy::success('Suppression réalisée avec succès !!!');
        return redirect()->
        route('Exploitations.indexMat',[
            'listExp' => $listExp,
            'select_mat' => $select_mat,
            'idMat' => $idMat,
            'materiel' => $materiel
        ]);
    }
}
