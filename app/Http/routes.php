<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Route Accueuil
 */
Route::get('/', [
    'uses' => function (){
        return view('home');},
    'as' => 'home'
]);

/**
 * Route Compte et Recherches pour VVA
 */
Route::group(['prefix' => 'compte','as' => 'compte.'],function(){
    Route::get('profil',['uses' => 'ComptesController@getProfil', 'as' => 'profil'])->middleware(['auth']);
    Route::get('inscription',
        ['uses'=>'ComptesController@registerGet', 'as' => 'register']);
    Route::post('inscription', ['uses' => 'ComptesController@registerPost', 'as' => 'register']);
    Route::get('login',['uses' => 'ComptesController@loginGet', 'as' => 'login']);
    Route::post('login',['uses'=> 'ComptesController@loginPost', 'as' => 'login']);
    Route::get('logout',['uses' => 'ComptesController@logout', 'as' => 'logout']);
    //User Gestionnaire Obligatoire
    Route::get('recherche/hebergement',['uses' => 'ComptesController@rechercheHebergement',
        'as' => 'recherche.vva_hebergements'])->middleware('gestionnaire');
    Route::get('recherche/reservations', ['uses' => 'ComptesController@rechercheResa',
        'as' => 'recherche.vva_reservation'])->middleware('gestionnaire');

});

/**
 * routes Reservation
 */

Route::group(['prefix'=>'reservation','as'=>'reservation.'],function(){
    Route::get('compte',['uses' => 'ReservationController@afficherResa', 'as' => 'compte.reservations']);
    Route::post('modification/valide',['uses' => 'ReservationController@modifierResaPostVVA',
        'as' => 'modification.valide']);
    Route::get('{noHebergement}/{date}/modification',['uses' => 'ReservationController@modifierResaGetVVA',
        'as' => 'modification.vva']);
    Route::get('{noHebergement}/creation',['uses' => 'ReservationController@creerResaGetVVA',
        'as' => 'creer']);
    Route::post('creation/valide/vva',['uses' => 'ReservationController@creerResaPostVVA',
        'as' => 'creation.vva']);
    Route::post('creation/valide',[
        'uses' => 'ReservationController@creerResaPostClient',
        'as' => 'creer.villageois']);

});


/**
 * Routes Hebergement
 */

Route::get('compte/hebergement',[
    'uses' => 'HebergementController@afficherHebergementVVA',
    'as' => 'vva_liste_hebergement'
]);



Route::get('hebergement/{noHebergement}/modification',[
    'uses' => 'HebergementController@modifierHebergementGetVVA',
    'as' => 'vva_modification_hebergement'
]);

Route::post('hebergement/modif',[
    'uses' => 'HebergementController@modifierHebergementPostVVA',
    'as' => 'hebergement_update'
]);

Route::get('hebergement/creation',[
    'uses' => 'HebergementController@creerHebergementGetVVA',
    'as' => 'creerHebergement'
]);

Route::post('hebergement/creation/success',[
    'uses' => 'HebergementController@creerHebergementPostVVA',
    'as' => 'creerHebergementPost'
]);

Route::get('hebergements/{typehebergement?}',[
    'uses' => 'HebergementController@afficherHebergementClient',
    'as' => 'rechercheHebergement'
]);

Route::get('hebergement/details/{noHeb}',[
    'uses'=>'HebergementController@afficherHebergementDetailClient',
    'as' => 'detailsHebergement'
]);

