<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Saison extends Model
{
    //
    protected $table = 'saison';
    public $timestamp = null;
    protected $primaryKey = 'codesaison';
    protected $fillable = ['codesaison','nomsaison'];


    public function getCodeSaison($debutSemaine,$finSemaine)
    {
        return DB::table('SAISON')
            ->select('CODESAISON')
            ->where('DATEDEBSAISON','<=',$debutSemaine)
            ->where('DATEFINSAISON','>=',$finSemaine)->get();
    }

    public function getAll()
    {
        return DB::table('SAISON')
            ->select('*');
    }
    public function getSaisonByDate($date){
        return DB::table('SAISON')
            ->select('*')
            ->where('DATEDEBSAISON','<=',$date)
            ->where('DATEFINSAISON','>=',$date);
    }
    public function getCodeSaisonActuelle($date){
        return DB::table('SAISON')
            ->select('CODESAISON')
            ->where('DATEDEBSAISON','<=',$date)
            ->where('DATEFINSAISON','>=',$date);
    }

}
