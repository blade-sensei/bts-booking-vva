<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        //Creation de la table Villageois
//        Schema::create('villageois',function(Blueprint $table)
//        {
//            $table->increments('novillageois');
//            $table->string('nomvillageois');
//            $table->string('prenomvillageois');
//            $table->string('adrmail')->unique();
//            $table->string('notel')->unique();
//            $table->string('noport')->unique();
//            $table->string('username_id')->unsigned();
//            $table->foreign('username_id')
//                    ->reference('username')
//                    ->on('users')
//                    ->OnDelete('restrinct')//permet d'assurer l'integrté referrentielle on doit d'abord supp un villageois
//                    //pour ssupprimer un utilisateur
//                    ->OnUpdate('restrinct');//de meme pour on delete avec les mise a jour
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        //
//        Schema::drop('villageois');
    }
}
