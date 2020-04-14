<?php

use Illuminate\Database\Seeder;

class HebergementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('hebergement')->delete();
        $orientation = array('sud','nord','est','ouest');
        $dispo = array('disponible','annulée','bloqué','travaux');

        for($i = 0; $i < 20; ++$i) {

            DB::table('hebergement')->insert([
                'noheb' => '100'.$i,
                'codetypeheb' => '100'.rand(1,3),
                'nomheb' => 'nom'.$i,
                'nbplaceheb' => rand(2,10),
                'surfaceheb' => rand(50,100),
                'internet' => rand(0,1),
                'anneeheb' => '201'.rand(0,9),
                'secteurheb' => 'secteur'.rand(0,10),
                'orientationheb' => $orientation[rand(0,3)],
                'etatheb' => $dispo[rand(0,3)],
                'descriheb' => $faker->paragraph(4),
                'photoheb' => $faker->imageUrl(300,300)
            ]);
        }
    }
}
