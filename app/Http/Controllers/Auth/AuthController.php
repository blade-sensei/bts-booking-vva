<?php

namespace App\Http\Controllers\Auth;


use App\Compte;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Compte $compte)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        //$this->compte = $compte;


    }

    /**
     * Get a validator for an incoming registration request.
     *P
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $compte = new Compte();
        return Validator::make($data, [
            'nomUtilisateur' => 'required|unique:compte,user'. $compte->user,
            'motDePasse' => 'required',
            'nom' => 'required',
            'prenom'=> 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        return Compte::create([
//            'user'=>$data['nomUtilisateur'],
//            'mdp'=>$data['motDePasse'],
//            'nomcompte'=>$data['nom'],
//            'prenomcompte'=>$data['prenom'],
//            'dateinscrip' => '12/12/12',
//            'datesuppression' => '',
//            'typecompte'=>'null'
//      ]);
        $compte = new Compte([
            'user'=>$data['nomUtilisateur'],
            'mdp'=>$data['motDePasse'],
            'nomcompte'=>$data['nom'],
            'prenomcompte'=>$data['prenom'],

        ]);
        $compte->dateinscrip = '12/12/12';
        $compte->datesuppression = '12/12/12';
        $compte->typecompte = 'vil';
        $compte->save();


        return $compte;

    }

//    public function redirectPath()
//    {
//        return route('login');
//    }

}
