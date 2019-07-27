<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHasAllergieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_allergie', function (Blueprint $table) {
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('allergie_id')->unsigned();
            $table->timestamps();
        });
        schema::table('user_has_allergie', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('allergie_id')->references('id')->on('allergie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_allergie');
    }
}
