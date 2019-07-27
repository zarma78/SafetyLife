<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->date('age');
            $table->integer('num_phone');
            $table->char('sexe', 25);
            $table->string('address');
            $table->string('password');
            $table->bigInteger('hopital_id')->unsigned()->nullable();
            $table->bigInteger('role_id')->unsigned()->default(4);
            $table->bigInteger("users_id")->unsigned();
            $table->timestamps();
        });
        schema::table('history_user', function (Blueprint $table) {
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
        Schema::dropIfExists('history_user');
    }
}
