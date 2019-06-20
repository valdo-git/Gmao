<?php

namespace App\Http\Controllers;

use App\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->role_id == 0 )//Administrateur
        {
            //dd(Auth::user()->name);
            //return view('auth/register');
            return view('admin/welcome');
        }

        elseif(Auth::user()->role_id == 1 ) {//opérateur gest tech
           // dd('mauvais');
            return redirect(route('homeGT'));//view('pagesGT/welcomeGT');
        }

        elseif(Auth::user()->role_id == 2 ) {//opérateur germac
            // dd('mauvais');
           return redirect(route('homeGermac'));
            //return view('pagesGermac/welcomeGermac');
        }
        elseif (Auth::user()->role_id == 3 ){//technicien
            $materiel = new Materiel();
            $materiels = $materiel->where('idgrpe',1)->paginate(5);
            $materiels2 = $materiel->where('idgrpe',2)->paginate(5);
            $materiels3 = $materiel->where('idgrpe',3)->paginate(5);

            if ($request->ajax()) {
                return [
                    'html1' => view('pageschefAt.indexMatGrpe1', compact('materiels'))->render(),
                    'html2' => view('pageschefAt.indexMatGrpe2', compact('materiels2'))->render(),
                    'html3' => view('pageschefAt.indexMatGrpe3', compact('materiels3'))->render()
                ];
            }

            return view('pageschefAt.indexMat', compact('materiels','materiels2','materiels3'));
        }


    }

}
