<?php

namespace App\Http\Controllers;

use App\Hebergement;
use App\Resa;
use App\Saison;
use App\Tarif;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Hebergement\CreateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;


class HebergementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show Formulaire de creation Hebergement
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function creerHebergementGetVVA()
    {
        return view('vva.creerHebergement');
    }

    /**
     * Traitement Creeation Hebergement
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function creerHebergementPostVVA(CreateRequest $request)
    {

        //traitement de creation Hebergement sans tarif
        $hebergement = new Hebergement([
            'CODETYPEHEB' => $request['typehebergement'],
            'NOMHEB' => $request['nomhebergement'],
            'NBPLACEHEB' => $request['placehebergement'],
            'SURFACEHEB' => $request['surfacehebergement'],
            'INTERNET' => $request['internethebergement'],
            'ANNEEHEB' => $request['anneehebergement'],
            'SECTEURHEB' => $request['secteurhebergement'],
            'ORIENTATIONHEB' => $request['orientationhebergement'],
            'ETATHEB' => $request['etathebergement'],
            'DESCRIHEB' => $request['descripthebergement'],
            'PHOTOHEB' => 'null'
            ]);
        $hebergement->save();

        //une clée etrangère ne peux pas etre changé directement par le filiable


        //Traitement pour le tarif Hebergement
            $data = [
                'NOHEB' => $hebergement->noheb,
                'CODESAISON' => 1,
                'PRIXHEB' => $request['tarifhebergement']];
            $tarif = new Tarif();
            $tarif->addTarif($data);


        //traitement de sauvegarde photos Hebergement - à faire
        //Repertoire : public/images

        $image = $request->file('photohebergement');
        if($image != NULL) {
            if ($image->isValid() && $request->hasFile('photohebergement')) {
                $nomImage = $hebergement->noheb;
                $extension = $image->getClientOriginalExtension();
                $image->move(public_path('images'), $nomImage . '.' . $extension);
                Hebergement::where('NOHEB', '=', $hebergement->noheb)->update([
                    'PHOTOHEB' => $nomImage . '.' . $extension
                ]);

            }
        }


        return view('templates.message')->with('message','Creation Hebergement validée');


    }
    public function getListeHebergement(Request $request)
    {

        $hebergement = new Hebergement();
        $nom = $request['nomhebergement'];
        $typeheb = $request['typehebergement'];
        $nbplaces = $request['nbplaces'];
        $surface = $request['surfacehebergement'];

        if($nom != null && $typeheb != null && $nbplaces != null && $surface != null)
        {
            $heb = $hebergement->getHebergementByNomTypePlaceSurface($nom,$typeheb,$nbplaces,$surface);
        }
        else if($nom != null && $typeheb != null && $nbplaces)
        {
            $heb = $hebergement->getHebergementByNomTypePlace($nom,$typeheb,$nbplaces);
        }
        else if($nom !=null && $typeheb != null)
        {
            $heb = $hebergement->getHebergementByNomType($nom,$typeheb);
        }
        else if($nom != null){
            $heb = $hebergement->getHebergementByNom($nom);
        }
        else
            $heb = $hebergement->getHebergement()->get();


        return view('vva.hebergements')->with('hebergements',$heb);

        //
    }

    /**
     * Traitement modification Hebergement
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modifierHebergementPostVVA(Request $request)
    {

        $modification = [
            'HEBERGEMENT.CODETYPEHEB' => $request['typehebergement'],
            'NOMHEB' => $request['nomhebergement'],
            'NBPLACEHEB' => $request['placehebergement'],
            'SURFACEHEB' => $request['surfacehebergement'],
            'ANNEEHEB' => $request['anneehebergement'],
            'ETATHEB' => $request['etathebergement'],
            'SECTEURHEB' => $request['secteurhebergement'],
            'ORIENTATIONHEB' => $request['orientationhebergement'],
            'DESCRIHEB' => $request['descripthebergement']
        ];

        $modification_tarif = [
            'PRIXHEB' => $request['prixHebergement']
        ];
        $heb = new Hebergement();
        $tarif = new Tarif();
        $saison = new Saison();
        $heb->updateHebergement($request['noheb'],$modification);
        $dateActuelle = date("Y-m-d");
        $saisonActuelle = $saison->getSaisonByDate($dateActuelle)->first();

        $tarif->updateTarifByNoHebSaison($request['noheb'],$saisonActuelle->CODESAISON,$modification_tarif);

//        if($request['newtarif'] != ''){
//            $data = [
//                'NOHEB' => $request['noheb'],
//                'CODESAISON' => $saisonActuelle->CODESAISON,
//                'PRIXHEB' => $request['newtarif']
//            ];
//            $tarif->addTarif($data);
//        }

        return view('templates.message')->with('message','Hébergement modifié');

    }


    /**
     * Show formulaire modification Hebergement
     * @param $noHebergement
     * @return view
     */
    public function modifierHebergementGetVVA($noHebergement)
    {
        $heb = new Hebergement();
        $saison = new Saison();
        $dateActuelle = date("Y-m-d");
        $saisonActuelle = $saison->getSaisonByDate($dateActuelle)->first();
        $hebergement = $heb->getHebergementById($noHebergement)->get();
        $saisonModel = new Saison();
        $saisons = $saisonModel->getAll()->get();

        $tarif = $heb->getTarifBySaisonHebergement($noHebergement,$saisonActuelle->CODESAISON)->first();

        $data['saisons'] = $saisons;
        $data['hebergement'] = $hebergement;
        $data['tarif'] = $tarif;
        if($hebergement == null){
            return view('templates.message')->with('message','Cette hebergement n"existe pas');
        }
        else
            return view('vva.hebergemetModification',$data);

    }


    public function afficherHebergementClient()
    {
//        if(Session::has('urlRecherche')==false){
//            Session::flash('urlRecherche',URL::full());
//        }
////        else{
////            if(Session::get('urlRecherche')!= URL::full()){
////                Session::put('urlRecherche',URL::full());
////            }
////        }

        $hebergement = new Hebergement();
        $resa = new Resa();
        $date =Input::get('datehebergement');
        $type = Input::get('typehebergement');
        $place = Input::get('nbplace');
        $prixmax = Input::get('prixmax');
        $prixmin = Input::get('prixmin');
        $hebergementDispo = $hebergement->getHebergement();

        //$hebergementDispo= $hebergement->getHebergement()->whereIn(('HEBERGEMENT.NOHEB'),$hebergement->getAllHebergementByType($type)->lists('HEBERGEMENT.NOHEB'))->get();
        if($type != null)
        {
          $hebergementDispo= $hebergementDispo->whereIn(('HEBERGEMENT.NOHEB'),$hebergement->getAllHebergementByType($type)
              ->lists('HEBERGEMENT.NOHEB'));

        }
        if($date != "")
        {

            $hebergementDispo = $hebergementDispo->whereIn(('HEBERGEMENT.NOHEB'),$resa->getResaDisponible($date)
                ->lists('RESA.NOHEB'));
        }
        if($place !=null){
            $hebergementDispo = $hebergementDispo->whereIn(('HEBERGEMENT.NOHEB'),$hebergement->getHebergementsByPlace($place)
                ->lists('HEBERGEMENT.NOHEB'));
        }
        if($prixmax !=null){
            $hebergementDispo = $hebergementDispo->whereIn('HEBERGEMENT.NOHEB',$hebergement->getHebergementByPrixMax($prixmax)
                ->lists('TARIF.NOHEB'));
        }
        if($prixmin !=null){
            $hebergementDispo = $hebergementDispo->whereIn('HEBERGEMENT.NOHEB',$hebergement->getHebergementByPrixMin($prixmin)
                ->lists('TARIF.NOHEB'));
        }

        return view('client.hebergementClient')->with('hebergements',$hebergementDispo->get());

    }

    /**
     * affiche liste hebergements pour le VVA after Recherche
     * @return view
     */
    public function afficherHebergementVVA(){
        $hebergement = new Hebergement();
        $date =Input::get('datehebergement');
        $type = Input::get('typehebergement');
        $place = Input::get('nbplace');
        $nom = Input::get('nomhebergement');
        $surface = Input::get('surfacehebergement');
        $hebergementCompte = $hebergement->getHebergement();

        if($nom != null)
        {
            $hebergementCompte = $hebergementCompte->whereIn(('HEBERGEMENT.NOHEB'),$hebergement->getHebergementByNom($nom)
                ->lists('HEBERGEMENT.NOHEB'));
        }
        if($type != null){
            $hebergementCompte = $hebergementCompte->whereIn(('HEBERGEMENT.NOHEB'),$hebergement->getAllHebergementByType($type)
                ->lists('HEBERGEMENT.NOHEB'));
        }
        if($place != null){
            $hebergementCompte = $hebergementCompte->whereIn(('HEBERGEMENT.NOHEB'),$hebergement->getHebergementsByPlace($place)
                ->lists('HEBERGEMENT.NOHEB'));
        }
        if($surface !=null){
            $hebergementCompte = $hebergementCompte->whereIn(('HEBERGEMENT.NOHEB'),$hebergement->getHebergementBySurface($surface)
                ->lists('HEBERGEMENT.NOHEB'));
        }

        return view('vva.hebergements')->with('hebergements',$hebergementCompte->get());
    }

    /**
     * Affiche details d'un hebergement Client
     * @param $nomHeb
     * @return view
     */
    public function afficherHebergementDetailClient($nomHeb){
        $hebergement = new Hebergement();
        $heb = $hebergement->getHebergementById($nomHeb)->get();
        return view('client.detailsHebergement')->with('hebergement',$heb);
    }
}
