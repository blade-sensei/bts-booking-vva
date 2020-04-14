<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use App\Villageois;
use Illuminate\Support\Facades\DB;

class Compte extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;


    //
    public $timestamps = false;
    protected $table = 'COMPTE';
    protected $primaryKey = 'USER';

    protected $fillable = ['user', 'mdp', 'nomcompte', 'prenomcompte'];
    //fillable conteint les champs qui peuvent être enregistrés directement dans la table
    //référance au stock controller
    protected $hidden = [];

    public function villageois()
    {
        return $this->hasOne('App\Villageois', 'USER', 'USER');
    }

    public function getAuthPassword()
    {
        return $this->MDP;
    }

    public function getAuthIdentifier()
    {

        return $this->USER;

    }
}
