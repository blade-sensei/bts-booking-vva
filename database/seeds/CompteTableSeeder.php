<?php

use Illuminate\Database\Seeder;

class CompteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function randDate()
    {
        return Carbon::createFromDate(null,rand(1,12),rand(1,28));
    }
    public function run()
    {
        DB::table('compte')->delete();

        for($i = 0; $i < 5; ++$i) {

            DB::table('compte')->insert([
                'user' => '100' . $i,
                'mdp' => 'mdp'.$i,
                'nomcompte' => 'nom'.$i,
                'prenomcompte' => 'prenom'.$i,
                'dateinscrip' => '12/12/'.$i,
                'datesuppression' => date_create(null),
                'typecompte' => 'vil'
            ]);
        }
    }
}
