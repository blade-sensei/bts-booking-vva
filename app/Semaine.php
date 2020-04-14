<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Semaine extends Model
{
    //
    protected $table = 'semaine';
    protected $timestamp = null;
    protected $primaryKey = array('noheb','codesaison');

    public function addSemaine($data)
    {
        DB::table('SEMAINE')
            ->insert($data);
    }
    static public function getAllSemaines(){
        return DB::table('SEMAINE')->select('*');
    }

    static public function getAllSemainesSupDate($date)
    {
        return DB::table('SEMAINE')->select('*')
            ->where('SEMAINE.DATEDEBSEM','>=',$date);
    }
}
