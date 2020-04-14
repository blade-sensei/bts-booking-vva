<?php

use Illuminate\Database\Seeder;

class SaisonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('saison')->delete();

        DB::table('saison')->insert([
                'codesaison' => 1,
                'nomsaison' => 'hiver',
                'datedebsaison' => '2015-12-19',
                'datefinsaison' => '2016-03-19'
            ]);
        DB::table('saison')->insert([
            'codesaison' => 2,
            'nomsaison' => 'printemps',
            'datedebsaison' => '2016-03-19',
            'datefinsaison' => '2016-06-18'
        ]);
        DB::table('saison')->insert([
            'codesaison' => 3,
            'nomsaison' => 'été',
            'datedebsaison' => '2016-06-18',
            'datefinsaison' => '2016-09-24'
        ]);

        DB::table('saison')->insert([
            'codesaison' => 4,
            'nomsaison' => 'automne',
            'datedebsaison' => '2016-09-24',
            'datefinsaison' => '2016-12-17'
        ]);
    }

}
