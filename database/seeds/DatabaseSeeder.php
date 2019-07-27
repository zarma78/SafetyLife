<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'name' => 'admin',
        ]);

        DB::table('role')->insert([
            'name' => 'directeur_hopital',
        ]);

        DB::table('role')->insert([
            'name' => 'medecin',
        ]);

        DB::table('role')->insert([
            'name' => 'patien',
        ]);

        DB::table('hopital')->insert([
            'name' => 'hell',
            'address' => 'en bas',
            'phone_number' => '0123456789' ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('hopital')->insert([
            'name' => 'seigneur des anneaux',
            'address' => 'sur la terre du milieu',
            'phone_number' => '0123456789' ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('hopital')->insert([
            'name' => 'heaven',
            'address' => 'en haut',
            'phone_number' => '0123456789' ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([

            'first_name' => 'Mathéo' ,
            'last_name' => 'Miquel' ,
            'email' => 'matheo@gmail.com' ,
            'age' => "1998-12-14" ,
            'num_phone' => '0666666666' ,
            'sexe' => 'homme' ,
            'address' => 'sous terre' ,
            'longitude' => 2.5678 ,
            'latitude' => 5.6789 ,
            'password' => bcrypt('bijour'),
            'hopital_id' => 1,
            'role_id' => 1,
            'pays' => 'france',
            'ville' => 'Montreuil',
            'code_postal' => 93100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Lucile' ,
            'last_name' => 'soen' ,
            'email' => 'lucile@gmail.com' ,
            'age' => "1950-12-14" ,
            'num_phone' => '0666666666' ,
            'sexe' => 'homme' ,
            'address' => 'au milieur' ,
            'password' => bcrypt('bijour'),
            'hopital_id' => 2,
            'role_id' => 2,
            'pays' => 'france',
            'ville' => 'Montreuil',
            'code_postal' => 93100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('users')->insert([
            'first_name' => 'Peter' ,
            'last_name' => 'Ricard' ,
            'email' => 'peter@gmail.com' ,
            'age' => "2009-12-14" ,
            'num_phone' => '0666666666' ,
            'sexe' => 'homme' ,
            'address' => 'en haut' ,
            'password' => bcrypt('bijour'),
            'hopital_id' => 3,
            'role_id' => 4,
            'enable' => false,
            'pays' => 'france',
            'ville' => 'Montreuil',
            'code_postal' => 93100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('personne_a_contacter')->insert([
            'first_name' => 'satan' ,
            'last_name' => 'lucifer' ,
            'email' => 'satan@gmail.com' ,
            'num_phone' => '0666666666' ,
            'address' => 'en bas' ,
            'users_id' => 1,
        ]);

        DB::table('personne_a_contacter')->insert([
            'first_name' => 'clément' ,
            'last_name' => 'Blond' ,
            'email' => 'clement@gmail.com' ,
            'num_phone' => '0666666666' ,
            'address' => 'sur terre' ,
            'users_id' => 3,
        ]);

        DB::table('info')->insert([
            'title' => 'the info',
            'contenue' => 'ça veut dire que c\'est le premier',
            'users_id' => 1,
        ]);

        DB::table('info')->insert([
            'title' => 'the info number 2',
            'contenue' => 'ça veut dire que c\'est le second',
            'users_id' => 1,
        ]);

        DB::table('info')->insert([
            'title' => 'the info number 3',
            'contenue' => 'ça veut dire que c\'est le troisieme',
            'users_id' => 2,
        ]);

        DB::table('allergie')->insert([
            'name' => 'satan c\'est plus fort que toi',
            'détails' => 'c\'est psk je suis satan lol',
        ]);

        DB::table('allergie')->insert([
            'name' => 'la zenitude',
            'détails' => 'psk t\'est vraiment pas calme',
        ]);

        DB::table('allergie')->insert([
            'name' => 'le calme',
            'détails' => 'psk t\'est vraiment pas calme, mais vraiment pas',
        ]);

        DB::table('allergie')->insert([
            'name' => 'val',
            'détails' => 'y\'a vraiment besoin d\'explication ?'
        ]);

        DB::table('history_user')->insert([
            'first_name' => 'Mathéo' ,
            'last_name' => 'Miquel' ,
            'email' => 'matheo@gmail.com' ,
            'age' => "1998-12-14" ,
            'num_phone' => '0666666666' ,
            'sexe' => 'homme' ,
            'address' => 'sur terre' ,
            'password' => 'bijour' ,
            'hopital_id' => 1,
            'users_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('history_user')->insert([
            'first_name' => 'Mathéo' ,
            'last_name' => 'Miquel' ,
            'email' => 'matheo@gmail.com' ,
            'age' => "1998-12-14" ,
            'num_phone' => '0999999999' ,
            'sexe' => 'homme' ,
            'address' => 'sur terre' ,
            'password' => 'bijour' ,
            'hopital_id' => 1,
            'users_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('history_user')->insert([
            'first_name' => 'Gerar' ,
            'last_name' => 'soen' ,
            'email' => 'lucile@gmail.com' ,
            'age' => "1900-12-14" ,
            'num_phone' => '0666666666' ,
            'sexe' => 'homme' ,
            'address' => 'sur terre' ,
            'password' => 'bijour' ,
            'hopital_id' => 2,
            'users_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        DB::table('history_user')->insert([
            'first_name' => 'Peter' ,
            'last_name' => 'Richard' ,
            'email' => 'peter@gmail.com' ,
            'age' => "1998-12-14" ,
            'num_phone' => '0666666666' ,
            'sexe' => 'homme' ,
            'address' => 'sur terre' ,
            'password' => 'bijour' ,
            'hopital_id' => 3,
            'users_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

        DB::table('user_has_allergie')->insert([
            'users_id' => 1,
            'allergie_id' => 1,
        ]);

        DB::table('user_has_allergie')->insert([
            'users_id' => 1,
            'allergie_id' => 2,
        ]);

        DB::table('user_has_allergie')->insert([
            'users_id' => 2,
            'allergie_id' => 2,
        ]);

        DB::table('user_has_allergie')->insert([
            'users_id' => 2,
            'allergie_id' => 3,
        ]);

        DB::table('user_has_allergie')->insert([
            'users_id' => 3,
            'allergie_id' => 4,
        ]);

        DB::table('alerte')->insert([
            'users_id' => 3,
            'active' => 0,
            'alert' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('alerte')->insert([
            'users_id' => 3,
            'active' => 0,
            'alert' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}



