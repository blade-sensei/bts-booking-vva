<?php

use Illuminate\Database\Seeder;

class SemaineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Première saison - Dates
         */
        DB::table('semaine')->insert([
            'datedebsem' => '2015-12-19',
            'codesaison' => 1,
            'datefinsem' => '2015-12-26'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2015-12-26',
            'codesaison' => 1,
            'datefinsem' => '2016-01-02'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-01-02',
            'codesaison' => 1,
            'datefinsem' => '2016-01-09'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-01-09',
            'codesaison' => 1,
            'datefinsem' => '2016-01-16'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-01-16',
            'codesaison' => 1,
            'datefinsem' => '2016-01-23'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-01-23',
            'codesaison' => 1,
            'datefinsem' => '2016-01-30'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-01-30',
            'codesaison' => 1,
            'datefinsem' => '2016-02-06'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-02-06',
            'codesaison' => 1,
            'datefinsem' => '2016-02-13'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-02-13',
            'codesaison' => 1,
            'datefinsem' => '2016-02-20'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-02-20',
            'codesaison' => 1,
            'datefinsem' => '2016-02-27'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-02-27',
            'codesaison' => 1,
            'datefinsem' => '2016-03-05'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-03-05',
            'codesaison' => 1,
            'datefinsem' => '2016-03-12'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-03-12',
            'codesaison' => 1,
            'datefinsem' => '2016-03-19'
        ]);

        /*
         * saison printemps Dates
         */

        DB::table('semaine')->insert([
            'datedebsem' => '2016-03-19',
            'codesaison' => 2,
            'datefinsem' => '2016-03-26'
        ]);

        DB::table('semaine')->insert([
            'datedebsem' => '2016-03-26',
            'codesaison' => 2,
            'datefinsem' => '2016-04-02'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-04-02',
            'codesaison' => 2,
            'datefinsem' => '2016-04-09'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-04-09',
            'codesaison' => 2,
            'datefinsem' => '2016-04-16'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-04-16',
            'codesaison' => 2,
            'datefinsem' => '2016-04-23'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-04-23',
            'codesaison' => 2,
            'datefinsem' => '2016-04-30'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-04-30',
            'codesaison' => 2,
            'datefinsem' => '2016-05-07'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-05-07',
            'codesaison' => 2,
            'datefinsem' => '2016-05-14'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-05-14',
            'codesaison' => 2,
            'datefinsem' => '2016-05-21'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-05-21',
            'codesaison' => 2,
            'datefinsem' => '2016-05-28'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-05-28',
            'codesaison' => 2,
            'datefinsem' => '2016-06-04'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-06-04',
            'codesaison' => 2,
            'datefinsem' => '2016-06-11'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-06-11',
            'codesaison' => 2,
            'datefinsem' => '2016-06-18'
        ]);

        /*
         * saison été Dates
         */
        DB::table('semaine')->insert([
            'datedebsem' => '2016-06-18',
            'codesaison' => 3,
            'datefinsem' => '2016-06-25'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-06-25',
            'codesaison' => 3,
            'datefinsem' => '2016-07-02'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-07-02',
            'codesaison' => 3,
            'datefinsem' => '2016-07-09'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-07-09',
            'codesaison' => 3,
            'datefinsem' => '2016-07-16'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-07-16',
            'codesaison' => 3,
            'datefinsem' => '2016-07-23'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-07-23',
            'codesaison' => 3,
            'datefinsem' => '2016-07-30'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-07-30',
            'codesaison' => 3,
            'datefinsem' => '2016-08-06'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-08-06',
            'codesaison' => 3,
            'datefinsem' => '2016-08-13'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-08-13',
            'codesaison' => 3,
            'datefinsem' => '2016-08-20'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-08-20',
            'codesaison' => 3,
            'datefinsem' => '2016-08-27'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-08-27',
            'codesaison' => 3,
            'datefinsem' => '2016-09-03'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-09-03',
            'codesaison' => 3,
            'datefinsem' => '2016-09-10'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-09-10',
            'codesaison' => 3,
            'datefinsem' => '2016-09-17'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-09-17',
            'codesaison' => 3,
            'datefinsem' => '2016-09-24'
        ]);
        /*
         * saison automne Dates
         */

        DB::table('semaine')->insert([
            'datedebsem' => '2016-09-24',
            'codesaison' => 4,
            'datefinsem' => '2016-10-01'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-10-01',
            'codesaison' => 4,
            'datefinsem' => '2016-10-08'
        ]);

        DB::table('semaine')->insert([
            'datedebsem' => '2016-10-08',
            'codesaison' => 4,
            'datefinsem' => '2016-10-15'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-10-15',
            'codesaison' => 4,
            'datefinsem' => '2016-10-22'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-10-22',
            'codesaison' => 4,
            'datefinsem' => '2016-10-29'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-10-29',
            'codesaison' => 4,
            'datefinsem' => '2016-11-05'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-11-05',
            'codesaison' => 4,
            'datefinsem' => '2016-11-12'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-11-12',
            'codesaison' => 4,
            'datefinsem' => '2016-11-19'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-11-19',
            'codesaison' => 4,
            'datefinsem' => '2016-11-26'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-11-26',
            'codesaison' => 4,
            'datefinsem' => '2016-12-03'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-12-03',
            'codesaison' => 4,
            'datefinsem' => '2016-12-10'
        ]);
        DB::table('semaine')->insert([
            'datedebsem' => '2016-12-10',
            'codesaison' => 4,
            'datefinsem' => '2016-12-17'
        ]);












    }
}
