<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resa extends Model
{
    //
    protected $table = 'resa';
    public $timestamps = null;
    protected $primaryKey = array('noheb','datedebsem');
    protected $fillable = ['NOHEB','DATEDEBSEM','CODEETATRESA','NOVILLAGEOIS'];


    public function getAllResa()
    {
        return  DB::table('RESA')
                ->join('HEBERGEMENT','RESA.NOHEB','=','HEBERGEMENT.NOHEB')
                ->join('ETAT_RESA','RESA.CODEETATRESA','=','ETAT_RESA.CODEETATRESA')
                ->join('SEMAINE','RESA.DATEDEBSEM','=','SEMAINE.DATEDEBSEM')
                ->select('*','HEBERGEMENT.NOMHEB','ETAT_RESA.NOMETATRESA','SEMAINE.DATEFINSEM')
                ->groupBy('RESA.NOHEB','RESA.DATEDEBSEM');
    }

    public function getResaByNom($nom)
    {
        return  DB::table('RESA')
            ->join('HEBERGEMENT','RESA.NOHEB','=','HEBERGEMENT.NOHEB')
            ->join('ETAT_RESA','RESA.CODEETATRESA','=','ETAT_RESA.CODEETATRESA')
            ->join('SEMAINE','RESA.DATEDEBSEM','=','SEMAINE.DATEDEBSEM')
            ->select('*','HEBERGEMENT.NOMHEB','ETAT_RESA.NOMETATRESA','SEMAINE.DATEFINSEM')
            ->where('HEBERGEMENT.NOMHEB',$nom);
    }

    public function getResaByDate($date)
    {
        return  DB::table('RESA')
            ->join('HEBERGEMENT','RESA.NOHEB','=','HEBERGEMENT.NOHEB')
            ->join('ETAT_RESA','RESA.CODEETATRESA','=','ETAT_RESA.CODEETATRESA')
            ->join('SEMAINE','RESA.DATEDEBSEM','=','SEMAINE.DATEDEBSEM')
            ->select('*','HEBERGEMENT.NOMHEB','ETAT_RESA.NOMETATRESA','SEMAINE.DATEFINSEM')
            ->where('RESA.DATEDEBSEM',$date);

    }
    public function getResaByNoHebergementAndDateDeb($noheb,$dateDebut)
    {
        return DB::table('RESA')
            ->join('HEBERGEMENT','RESA.NOHEB','=','HEBERGEMENT.NOHEB')
            ->join('ETAT_RESA','RESA.CODEETATRESA','=','ETAT_RESA.CODEETATRESA')
            ->join('SEMAINE','RESA.DATEDEBSEM','=','SEMAINE.DATEDEBSEM')
            ->select('*','HEBERGEMENT.NOMHEB','ETAT_RESA.NOMETATRESA','SEMAINE.DATEFINSEM')
            ->where('RESA.NOHEB',$noheb)
            ->where('RESA.DATEDEBSEM',$dateDebut)
            ->get();
    }

    public function updateResa($noheb,$dateDebut,$listeupdate)
    {
        DB::table('RESA')
            ->join('HEBERGEMENT','RESA.NOHEB','=','HEBERGEMENT.NOHEB')
            ->where('RESA.NOHEB',$noheb)
            ->where('RESA.DATEDEBSEM',$dateDebut)
            ->update($listeupdate);
    }

    public function addResa($data)
    {
         DB::table('RESA')->insert($data);
    }

    public function getResaDisponible($date)
    {
        return DB::table('RESA')
            ->select('*')
            ->join('ETAT_RESA','RESA.CODEETATRESA','=','ETAT_RESA.CODEETATRESA')
            ->where('ETAT_RESA.NOMETATRESA','!=','bloqué')
            ->where('RESA.DATEDEBSEM','>=',$date);
    }

    /**
     * @param $novillageois
     */
    public function getListeResaByVillageois($novillageois)
    {
        return DB::table('RESA')
            ->join('ETAT_RESA','RESA.CODEETATRESA','=','ETAT_RESA.CODEETATRESA')
            ->join('SEMAINE','RESA.DATEDEBSEM','=','SEMAINE.DATEDEBSEM')
            ->select('*','ETAT_RESA.NOMETATRESA','SEMAINE.DATEFINSEM')
            ->where('NOVILLAGEOIS',$novillageois);
    }
}
