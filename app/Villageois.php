<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Villageois extends Model
{
    //

    protected $table = 'villageois';
    protected $timestamp = 'false';
    protected $primaryKey = 'novillageois';

    public function hebergements()
    {
         return $this->hasOne('App\Hebergement');
    }

    public function compte()
    {
        return $this->belongsTo('App\Compt$e','user',$this->primaryKey);
    }

    public function resa()
    {
        //premier paramètre la table, ensuite le nom de la clé étrangère dans la table passé
        //et enfin le nom du notre champs dans ce model (villageois)
        return $this->hasMany('App\Resa','NOVILLAGEOIS','NOVILLAGEOIS');
    }
    
    public function getAttributes()
    {
      return DB::table($this->table)->select(DB::raw('*'))->where('NOVILLAGEOIS',$this->NOVILLAGEOIS)->get();

    }
    public function getReservations($noVillageois)
    {
        return DB::table('resa')->select(DB::raw('*'))->where('NOVILLAGEOIS',$noVillageois)->get();
    }

    public function getNoVillageoisByUser($user)
    {
        return DB::table('VILLAGEOIS')
            ->select('NOVILLAGEOIS')
            ->where('USER','=',$user)->get();
    }

    public function addVillageois($data){
        DB::table('VILLAGEOIS')
            ->insert($data);
    }

    public function maxNoVillageois(){
        return DB::table('VILLAGEOIS')
            ->max('NOVILLAGEOIS');
    }

}
