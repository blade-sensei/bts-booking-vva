<?php
/**
 * Created by PhpStorm.
 * User: juancoyla
 * Date: 13/11/15
 * Time: 16:50
 */

namespace App\Http\Controllers;

use App\Hebergement;
use App\Http\Requests\RegisterRequest;
use App\Resa;
use Illuminate\Support\Facades\Auth;
use App\Compte;
use App\Repositories\CompteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class ComptesController extends Controller
{

    protected $compteRepository;
    public function __construct(CompteRepository $compteRepository)
    {
        $this->compteRepository = $compteRepository;

    }

    /**
     * Show Formulaire d'inscription Compte
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerGet()
    {
        return view('compte.inscription');
    }
    /**
     * Traitement d'inscription Compte
     * @param Request $request
     * @return view Message validation ou Erreurs de validation
     */
    public function registerPost(Request $request)
    {

        return $this->compteRepository->create($request->all());

    }

    /**
     * Show Formulare Login Compte
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginGet()
    {
            return view('compte.login');
    }

    /**
     * Traitement de connection Compte
     * @param Request $request
     * @return view Validation ou Erreurs
     */
    public function loginPost(Request $request)
    {
        if($this->compteRepository->login($request->all()) > 0)
        {
            return redirect()->action('ComptesController@getProfil');
        }
        else
            return Redirect::back()->withErrors(['Mot de passe ou Nom Utilisateur incorrect', 'Resaisir']);
    }

    /**
     * Deconnection
     * @return Redirect page accueil
     */
    public function logout()
    {
        Auth::logout();
        Session::forget('compte');
        return redirect('/');
    }

    /**
     * Affiche la page Profil de l'utilisateur
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfil()
    {

        if(Auth::user()->TYPECOMPTE == 'vil')
        {
            return view('villageois.profilVillageois');
        }
        elseif(Auth::user()->TYPECOMPTE == 'vva')
        {
            return view('vva.profilVVA');
        }
    }

    /**
     * Show barre de recherche Reservation dans Profil
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rechercheResa()
    {
        return view('vva.rechercheReservation');
    }

    /**
     * Show barre de recherche Hebergement dans Profil
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rechercheHebergement()
    {
        return view('vva.rechercheHebergement');
    }





}