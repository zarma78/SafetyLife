<?php

use Illuminate\Support\Facades\Schema;
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
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->date('age');
            $table->integer('num_phone');
            $table->char('sexe', 25);
            $table->string('address');
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->integer('code_postal')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('longitude', 40, 30)->nullable();
            $table->decimal('latitude', 40, 30)->nullable();
            $table->boolean('enable')->default(true);
            $table->bigInteger('hopital_id')->unsigned()->nullable();
            $table->bigInteger('role_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });
        schema::table('users', function (Blueprint $table) {
            $table->foreign('hopital_id')->references('id')->on('hopital');
            $table->foreign('role_id')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
