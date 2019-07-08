 <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*LOGIQUE A RESPECTER :: MES ROUTES EN MIN ET LES RESOURCES ROUTES COMMENCENT PAR MAJ

*/


Route::get('/Admin', function () {
    return view('admin/welcome');
})->name('homeAdmin');

//pour faire des enregistrements d'user uniquement en test
/*Route::get('/home', function () {
 return view('auth/register');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');


Route::middleware('auth')->group(function () {

    ///////////////////////////////////// ROUTES POUR LA Gestion tecnique ///////////////////////////////

    /////routes pour ecran principal opGT
    Route::get('/OpGT', 'AccueilGTController@index'//function () { }
   )->name('homeGT');

    /////routes pour ecran creation d'equipement special
    Route::get('/Materiels/create1', 'MaterielsController@create1'//function () { }
   );

    /////routes pour ecran creation d'equipement d'entretien
    Route::get('/Materiels/create2', 'MaterielsController@create2'//function () { }
   );

    /////routes pour ecran liste des équipements d'entretien
    Route::get('/Materiels/listEntretien', 'MaterielsController@listEntretien'//function () { }
   );

    /////routes pour ecran des équipements scpéciaux
    Route::get('/Materiels/listSpecial', 'MaterielsController@listSpecial'//function () { }
   );

    // route pour affichage profil gt
    Route::get('/OpGT/profil', 'AccueilGTController@profil'//function () { }
    )->name('profilGT');


 // route pour le matériel indispo
    Route::get('/OpGT/matIndispo', 'AccueilGTController@matindispo'//function () { }
    )->name('homeGTMatIndispo');

    // route pour
    Route::get('/OpGT/OTouverts', 'AccueilGTController@OTouverts'//function () { }
    )->name('homeGTOTouverts');

   //route pour passage 1ere étape à 2ème étape création programme ent
     Route::post('/OpGT/programs/create2/', 'ProgramsController@preStore'//function () { }
     )->name('createProg1to2');

    //route pour les sélections de matos
    Route::get('ordres/selectMat', 'OrdreController@selectMat')->name('Ordres.selectMat');
    Route::get('dossiers/selectMat', 'DossierController@selectMat')->name('Dossiers.selectMat');
    Route::get('dossiers/afficheOpOdre', 'DossierController@listOpDeOrdre')->name('Dossiers.listOpDeOrdre');

    //route pour l'affichage de la liste des ordres e fonction du statut
    route::get('ordres/ordresList', 'OrdreController@index')->name('Ordres.ordresList');

    //route pour création d'atelier ds le modal
    Route::post('ateliers/store', 'AtelierController@store2')->name('Ateliers.store2');

    //route pour création d'emplacement ds le modal
    Route::post('emplacements/store', 'EmplacementController@store2')->name('Emplacements.store2');

    ///////routes de l'admin

    //Route::get('auth/', 'AuthController@store2')->name('Emplacements.store2');



///////////////////////////////////// ROUTES POUR LE GERMAC ///////////////////////////////
    /////route pour ecran principal opGermac
  /*  Route::get('/OpGermac', function () {
        return view('pagesGermac/accueilGermac');
    })->name('homeGermac');*/

    Route::get('/OpGermac', 'AccueilGermacController@index'//function () { }
    )->name('homeGermac');

    //route pour la liste du matériel vue par le germac
    Route::get('/materiels/index2', 'MaterielsController@index2')->name('Materiels.index2');

    // route pour les exploitations liées à un matériel
    Route::post('exploitationsMat/', 'ExploitationController@indexMat')->name('ExploitationsMat.index');
    Route::get('exploitationsMat/', 'ExploitationController@indexMat')->name('Exploitations.indexMat');
    Route::get('exploitations/selectMat/{action}', 'ExploitationController@selectMat')->name('Exploitaions.selectMat');

    // route pour les demandeurs a partir du menu
    Route::post('demandeurs/store2', 'DemandeurController@store2')->name('Demandeurs.store2');

    //route pour consulter les ordres de travail
    Route::get('ordres/Dv/', 'OrdreController@indexDV')->name('Ordres.indexDV');

    //route pour consulter les dossiers de visite

    //route pour consulter les ordres de travail ouverts

    ///route pour consulter un ordre de travail particulier

    //////////////////////////////////////////////////////////////////////////////////

    //// route pour les resouces controller
    Route::resources([
        'Ateliers'=>'AtelierController',
        'Materiels' => 'MaterielsController',
        'programs' => 'ProgramsController',
        'Ordres' => 'OrdreController',
        'Cartes' => 'CarteController',
        'Dossiers' => 'DossierController',
        'programs.operations'=> 'ProgramsOperationsController',
        'Techniciens' =>'TechnicienController',
        // routes pour resource controller Germac
        'Exploitations'=>'ExploitationController',
        'Demandeurs'=>'DemandeurController',
        'Emplacements'=>'EmplacementController',
        //admin
        'User'=>'UserController',



    ]);
});