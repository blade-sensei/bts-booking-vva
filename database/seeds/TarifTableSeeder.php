<?php

use Illuminate\Database\Seeder;

class TarifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarif')->delete();
        for($i = 0; $i<20; ++$i)
        {
            DB::table('tarif')->insert([
                'noheb' => '100'.$i,
                'codesaison' => rand(1,4),
                'prixheb' => rand(200,500)
            ]);
        }
    }
}
