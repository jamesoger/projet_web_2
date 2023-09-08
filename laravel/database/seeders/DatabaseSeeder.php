<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**************
         * UTILISATEURS
         **************/

         User::factory()->create([
            "prenom" => "Gerard",
            "nom" => "Sylvain",
            "email" => "gege@gmail.com"
        ]);

        // Ajout d'utilisateurs fictifs
        \App\Models\User::factory(9)->create();

         /**************
         * ADMINISTRATEURS
         **************/

         Admin::factory()->create([
            "prenom" => "Daron",
            "nom" => "Tonton",
            "email"=>"daron@pw2.ca",
            "droits"=>1,
         ]);

         \App\Models\Admin::factory(9)->create();

    }


}
