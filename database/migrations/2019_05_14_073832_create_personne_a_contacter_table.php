<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonneAContacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne_a_contacter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('num_phone');
            $table->string('address');
            $table->bigInteger('users_id')->unsigned();
            $table->timestamps();
        });
        schema::table('personne_a_contacter', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personne_a_contacter');
    }
}
