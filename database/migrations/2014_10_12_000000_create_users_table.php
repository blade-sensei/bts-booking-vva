<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {//Creation de la table user (users)

        Schema::create('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->string('mdp')->unique();
            $table->string('nomcompte')->unique();
            $table->string('prenomcompte');
            $table->date('dateinscrip');
            $table->date('datesuppression');
            $table->string('typecompte');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
