<?php

use Illuminate\Database\Seeder;

class VillageoisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villageois')->delete();

        for($i = 0; $i < 5; ++$i) {

            DB::table('villageois')->insert([
                'novillageois' => '100' . $i,
                'user' => '100'.$i,
                'nomvillageois' => 'nomvill'.$i,
                'prenomvillageois' => 'prenomvill'.$i,
                'adrmail' => 'adressemail@gmail',
                'notel' => '010102030'.$i,
                'noport' => '060102030'.$i,
            ]);
        }
    }
}
