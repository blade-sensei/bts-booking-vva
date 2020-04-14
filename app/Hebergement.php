<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hebergement extends Model
{
    protected $primaryKey = 'noheb';
    protected $table = 'hebergement';
    public $timestamps = false;
    protected $fillable = ['CODETYPEHEB','NOMHEB','NBPLACEHEB','SURFACEHEB','INTERNET','ANNEEHEB','SECTEURHEB','ORIENTATIONHEB',
    'ETATHEB','DESCRIHEB'];
    //il faut faire une reserviation d'accord


    public function villageois()
    {
        return $this->belongsTo('Villageois');
    }
    public function tarif()
    {
        return $this->belongsToMany('App\Tarif','NOHEB','NOHEB');
    }


    public function getAttributes()
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->select('NOHEB','NOMHEB','TYPE_HEB.NOMTYPEHEB','NBPLACEHEB','SURFACEHEB','INTERNET','ANNEEHEB','SECTEURHEB','ORIENTATIONHEB',
                'ETATHEB','DESCRIHEB')->get();

    }

    public function getHebergement()
    {
        return DB::table('HEBERGEMENT')
                ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
                ->join('TARIF','HEBERGEMENT.NOHEB','=','TARIF.NOHEB')
                ->select('*','TYPE_HEB.NOMTYPEHEB','TARIF.PRIXHEB')
                ->orderby('HEBERGEMENT.NOHEB');

    }

    public function getHebergementByNomTypePlaceSurface($nom,$typeHeb,$nbPlaces,$surface)
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB', 'HEBERGEMENT.CODETYPEHEB', '=', 'TYPE_HEB.CODETYPEHEB')
            ->join('TARIF', 'HEBERGEMENT.NOHEB', '=', 'TARIF.NOHEB')
            ->select('*', 'TYPE_HEB.NOMTYPEHEB', 'TARIF.PRIXHEB')
            ->groupBy('HEBERGEMENT.NOHEB', 'TYPE_HEB.NOMTYPEHEB')
            ->having('HEBERGEMENT.NOMHEB', '=', $nom)
            ->orHaving('TYPE_HEB.NOMTYPEHEB', '=', $typeHeb)
            ->orHaving('HEBERGEMENT.NBPLACEHEB', '=', $nbPlaces)
            ->orHaving('HEBERGEMENT.SURFACEHEB', '=', $surface)
            ->get();
    }

    public function getHebergementByNomTypePlace($nom,$typeHeb,$nbPlaces)
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->join('TARIF','HEBERGEMENT.NOHEB','=','TARIF.NOHEB')
            ->select('*','TYPE_HEB.NOMTYPEHEB','TARIF.PRIXHEB')
            ->where('HEBERGEMENT.NOMHEB','=',$nom)
            ->where('TYPE_HEB.NOMTYPEHEB','=',$typeHeb)
            ->where('HEBERGEMENT.NBPLACEHEB','=',$nbPlaces);
    }
    public function getHebergementByNomType($nom,$typeHeb)
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->join('TARIF','HEBERGEMENT.NOHEB','=','TARIF.NOHEB')
            ->select('*','TYPE_HEB.NOMTYPEHEB','TARIF.PRIXHEB')
            ->where('HEBERGEMENT.NOMHEB','=',$nom)
            ->where('TYPE_HEB.NOMTYPEHEB','=',$typeHeb);
    }
    public  function getHebergementByNom($nom)
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->join('TARIF','HEBERGEMENT.NOHEB','=','TARIF.NOHEB')
            ->select('*','TYPE_HEB.NOMTYPEHEB','TARIF.PRIXHEB')
            ->where('HEBERGEMENT.NOMHEB','=',$nom);

    }

    public function getHebergementBySurface($surface)
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->join('TARIF','HEBERGEMENT.NOHEB','=','TARIF.NOHEB')
            ->select('*','TYPE_HEB.NOMTYPEHEB','TARIF.PRIXHEB')
            ->where('HEBERGEMENT.SURFACEHEB','=',$surface);
    }
    public  function getHebergementById($noheb)
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->join('TARIF','HEBERGEMENT.NOHEB','=','TARIF.NOHEB')
            ->select('*','TYPE_HEB.NOMTYPEHEB','TARIF.PRIXHEB')
            ->where('HEBERGEMENT.NOHEB','=',$noheb);
    }
    public function updateHebergement($noheb,$listeupdate)
    {
        DB::table('HEBERGEMENT')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->where('HEBERGEMENT.NOHEB',$noheb)
            ->update($listeupdate);
    }

    public function getHebergementByTypeDatePlace($type,$date,$place)
    {
        $queryB = DB::table('RESA');
        return DB::table('HEBERGEMENT')
            ->select('*')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->where('TYPE_HEB.NOMTYPEHEB',$type)
            ->where('HEBERGEMENT.NBPLACEHEB',$place)
            ->whereNotIn('NOHEB',
                $queryB
                    ->join('ETAT_RESA','RESA.CODEETATRESA','=','ETAT_RESA.CODEETATRESA')
                    ->where('RESA.DATEDEBSEM','=',$date)
                    ->where('RESA.DATEDEBSEM','=',$date)
                    ->where('ETAT_RESA.NOMETATRESA','annulee')
                    ->lists('RESA.NOHEB'))->get();
    }

    public function getAllHebergementByType($type)
    {
        return DB::table('HEBERGEMENT')
            ->select('*','TYPE_HEB.NOMTYPEHEB','TARIF.PRIXHEB')
            ->join('TYPE_HEB','HEBERGEMENT.CODETYPEHEB','=','TYPE_HEB.CODETYPEHEB')
            ->join('TARIF','HEBERGEMENT.NOHEB','=','TARIF.NOHEB')
            ->where('TYPE_HEB.NOMTYPEHEB',$type)
            ->groupBy('HEBERGEMENT.NOHEB');
    }

    public function getHebergementsHabitables()
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB', 'HEBERGEMENT.CODETYPEHEB', '=', 'TYPE_HEB.CODETYPEHEB')
            ->join('TARIF', 'HEBERGEMENT.NOHEB', '=', 'TARIF.NOHEB')
            ->select('*', 'TYPE_HEB.NOMTYPEHEB', 'TARIF.PRIXHEB')
            ->where('HEBERGEMENT.ETATHEB', 'habitable')
            ->orderby('HEBERGEMENT.NOHEB');
    }

    public function getHebergementsByPlace($place)
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB', 'HEBERGEMENT.CODETYPEHEB', '=', 'TYPE_HEB.CODETYPEHEB')
            ->join('TARIF', 'HEBERGEMENT.NOHEB', '=', 'TARIF.NOHEB')
            ->select('*', 'TYPE_HEB.NOMTYPEHEB', 'TARIF.PRIXHEB')
            ->where('HEBERGEMENT.NBPLACEHEB', $place);
    }

    public function getHebementByNom($nom)
    {
        return DB::table('HEBERGEMENT')
            ->join('TYPE_HEB', 'HEBERGEMENT.CODETYPEHEB', '=', 'TYPE_HEB.CODETYPEHEB')
            ->join('TARIF', 'HEBERGEMENT.NOHEB', '=', 'TARIF.NOHEB')
            ->select('*', 'TYPE_HEB.NOMTYPEHEB', 'TARIF.PRIXHEB')
            ->where('HEBERGEMENT.NOMHEB', $nom);
    }

    public function getHebergementByPrixMax($prixmax){
        return DB::table('TARIF')
            ->select('TARIF.NOHEB')->where('TARIF.PRIXHEB','<',$prixmax);
    }

    public function getHebergementByPrixMin($prixmin)
    {
        return DB::table('TARIF')
            ->select('TARIF.NOHEB')->where('TARIF.PRIXHEB','>',$prixmin);
    }

    public static function getSemaineDisponibles($noheb)
    {
        return DB::table('SEMAINE')
            ->select('*')
            ->whereNotIn('DATEDEBSEM',
                DB::table('RESA')
                    ->join('ETAT_RESA','RESA.CODEETATRESA','=','ETAT_RESA.CODEETATRESA')
                    ->select('*')
                    ->where('NOHEB','=',$noheb)
                    ->where('ETAT_RESA.NOMETATRESA','=','bloqué')
                    ->whereOr('ETAT_RESA.NOMETATRESA','=','payée')
                    ->lists('DATEDEBSEM'));

    }

    public static function getSecteurs(){
        return DB::table('HEBERGEMENT')
            ->select('SECTEURHEB')
            ->groupBy('SECTEURHEB')
            ->orderBy('SECTEURHEB');
    }

    public function getTarifBySaisonHebergement($noHeb,$saison){
        return DB::table('TARIF')
            ->select('PRIXHEB')
            ->where('NOHEB',$noHeb)
            ->where('CODESAISON',$saison);
    }


}
