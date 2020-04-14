<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tarif extends Model
{
    protected $primaryKey = array('NOHEB','CODESAISON');
    protected $table = 'TARIF';
    public $timestamps = false;
    protected $fillable = ['NOHEB','CODESAISON','PRIXHEB'];

    public function addTarif($data)
    {
        DB::table('tarif')->insert($data);

    }

    public function hebergement()
    {
        return $this->belongsToMany('App\Hebergement','NOHEB','NOHEB');
    }

    public function prixByHebSaison($noheb,$saison)
    {
        DB::table('TARIF')
            ->select('PRIXHEB')
            ->where('NOHEB','=',$noheb)
            ->where('CODESAISON','=',$saison)
            ->get();
    }
    public function updateTarifByNoHebSaison($noHebergement,$saison,$listeUpdate){
        DB::table('TARIF')
            ->where('NOHEB',$noHebergement)
            ->where('CODESAISON',$saison)
            ->update($listeUpdate);
    }

    public function getTarifByNoHebergement($noHebergement){
       return  DB::table('TARIF')
            ->select('TARIF.PRIXHEB')
            ->where('TARIF.NOHEB','=',$noHebergement);
    }

}
