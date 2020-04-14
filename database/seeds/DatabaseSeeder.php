<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call('CompteTableSeeder');
        //$this->call('VillageoisTableSeeder');
        //$this->call('HebergementTableSeeder');
        //$this->call('SaisonTableSeeder');

        //$this->call('SemaineTableSeeder');
        //$this->call('TarifTableSeeder');
        Model::reguard();
    }
}


