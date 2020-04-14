<?php

namespace App\Http\Controllers;

use App\Hebergement;
use App\Saison;
use App\Semaine;
use App\Tarif;
use App\Villageois;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Resa;
use Illuminate\Support\Facades\View;

class ReservationController extends Controller
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
     * Affiche formulaure creation reservation pour un hebergement
     * @param $noHebergement
     * @return view
     */
    public function creerResaGetVVA($noHebergement)
    {
        $heb = new Hebergement();
        $hebergement = $heb->getHebergementById($noHebergement);
        return view('vva.creerReservation')->with('hebergements',$hebergement->get());

    }

    /**
     * Traitement Creation Reservation VVA user
     * @param Requests\Reservation\CreateRequest $request
     * @return mixed
     */
    public function creerResaPostVVA(Requests\Reservation\CreateRequest $request)
    {

        $user = new Villageois();
        $resa = new Resa();
        $tarif = new Tarif();
        $noHeb = $user->getNoVillageoisByUser($request['userreservation']);

        $dataResa = [
            'NOHEB' => $request['noheb'],
            'DATEDEBSEM' => $request['debutreservation'],
            'NOVILLAGEOIS' => $noHeb[0]->NOVILLAGEOIS,
            'NBOCCUPANT' => $request['occupantreservation'],
            'CODEETATRESA' => 1,
            'DATERESA' => date('Y-m-d')

        ];

        $resa->addResa($dataResa);
        return view('templates.message')->with('message','Reservation Validée');
    }

    /**
     * Traitement creation Reservation Client user
     * @param Request $request
     * @return view
     */
    public function creerResaPostClient(Request $request ){

        if(Auth::check()) {
            $resa = new Resa();
            $tarif = new Tarif();
            $prix = $tarif->getTarifByNoHebergement($request['noheb'])->get();

            $dataResa = ([
                'NOHEB' => $request->noheb,
                'DATEDEBSEM' => $request->dateReservation,
                'NOVILLAGEOIS' => Auth::user()->villageois()->get()[0]->NOVILLAGEOIS,
                'NBOCCUPANT' => $request->placeReservation,
                'CODEETATRESA' => 1,
                'DATERESA' => date('Y-m-d'),
                'PRIXRESA' => $prix[0]->PRIXHEB
            ]);
            $resa->addResa($dataResa);
            return view('templates.message')->with('message', 'Reservation Validée');
        }
        else
            return redirect()->back()->withErrors('Connexion obligatoire');
    }

    /**
     * affiche les reservation selon villageois ou vva user
     * @return view
     */
    public function afficherResa()
    {
        if (auth()->user()->TYPECOMPTE == 'vil') {
            $resa = new Resa();
            $villageois = auth()->user()->villageois;
            if($villageois != null) {
                $listeReservations = $resa->getListeResaByVillageois($villageois->NOVILLAGEOIS)->get();
            }
            else{
                $listeReservations = [];
            }

            return view('templates.villageoisReservations')->with('reservations', $listeReservations)->with('villageois', $villageois);
        }
        elseif(auth()->user()->TYPECOMPTE =='vva')
        {
            $nom = Input::get('nomHebergement');
            $date = Input::get('semaineHebergement');

            $resa = new Resa();
            $listeReservations = $resa->getAllResa();
            if($nom != null)
            {
                $listeReservations = $listeReservations->whereIn(('HEBERGEMENT.NOMHEB'),$resa->getResaByNom($nom)
                    ->lists('HEBERGEMENT.NOMHEB'));
            }
            if($date !=null)
            {
                $listeReservations = $listeReservations->whereIn(('RESA.DATEDEBSEM'),$resa->getResaByDate($date)
                    ->lists('RESA.DATEDEBSEM'));
            }

            return view('vva.reservations')->with('reservations',$listeReservations->get());
        }

    }

    /**
     * Modification hebergement
     * @param $noHebergement
     * @param $date
     * @return mixed
     */
    public function modifierResaGetVVA($noHebergement, $date)
    {
        $resa = new Resa();
        $reservation = $resa->getResaByNoHebergementAndDateDeb($noHebergement,$date);

        return view('vva.reservationModification')->with('reservation',$reservation);
    }

    /**
     * Traitement de modification Reservation
     * @param Request $request
     * @return View Message validation
     */
    public function modifierResaPostVVA(Request $request)
    {

        //iformation à modifier
        $modification = [
            'CODEETATRESA' => $request['etatresa'],
            'DATEACCUSERECEPT' => $request['dateReception'],
            'DATEARRHES' => $request['dateArrhes'],
            'MONTANTARRHES' => $request['montant'],
            'NBOCCUPANT' => $request['nbPersonne'],
            'PRIXRESA' => $request['prix']
        ];
        $resa = new Resa();

        //requete update selon la semaine et le noheb
        $resa->updateResa($request['noheb'],$request['datedebsem'],$modification);
        return view('templates.message')->with('message','Modification validée');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
