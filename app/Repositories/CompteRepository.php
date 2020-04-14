<?php
namespace App\Repositories;
use App\Compte;
use App\Villageois;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


/**
 * Created by PhpStorm.
 * User: juancoyla
 * Date: 11/11/15
 * Time: 19:27
 */
class CompteRepository
{
    protected $compte;

    public function __construct(Compte $compte)
    {
        $this->compte = $compte;
    }
    public function create($inputs)
    {
        $rules = [
            'nomUtilisateur' => 'required|unique:COMPTE,USER',
            'motDePasse' => 'required',
            'nom' => 'required',
            'prenom'=> 'required'
        ];
       $validator = Validator::make($inputs,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        else {
            $compte = new Compte([
                'user' => $inputs['nomUtilisateur'],
                'mdp' => $inputs['motDePasse'],
                'nomcompte' => $inputs['nom'],
                'prenomcompte' => $inputs['prenom'],

            ]);
            $compte->dateinscrip = date("2015-m-y");
            $compte->datesuppression = '';
            $compte->typecompte = 'vil';
            $compte->save();
            $villageois = new Villageois();

            $max = $villageois->maxNoVillageois();
            $data = [
                'NOVILLAGEOIS' => $max +1,
                'USER' => $inputs['nomUtilisateur'],
                'NOMVILLAGEOIS' => $inputs['nom'],
                'PRENOMVILLAGEOIS' => $inputs['prenom'],
                'ADRMAIL' => $inputs['mail'],
                'NOTEL' => $inputs['telephone'],
                'NOPORT' => $inputs['portable']
            ];


            $villageois->addVillageois($data);
            return view('templates.message')->with('message','Validée');
        }

    }
    public function login($input){
        $rules = [
            'nomUtilisateur' => 'required',
            'motDePasse' => 'required'
        ];
        Validator::make($input, $rules);

        $username = $input['nomUtilisateur'];
        $password = $input['motDePasse'];

        //si on regarde dans Guard on voir qu'avec le
        //attempt il créer aussi un utilisateur
        if (Auth::attempt([
            'user' => $username,
            'password' => $password,
        ])){
            $user = Auth::user();
            if ($user->TYPECOMPTE == 'vil') {
                Session::put('compte',$user);
                return 1;
            }
            elseif ($user->TYPECOMPTE == 'vva')
            {
                Session::put('compte',$user);
                return 2;
            }
        }
        else
            return 0;
    }



}