<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

       DB::table('admins')->insert([
            [
                "prenom" => "Daron",
                "nom" => "Tonton",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                "email" => "daron@pw2.ca",
                "image" => "/storage/uploads/G3VWmc8yKvSYcm6UgH3IurkTAzMowNzfTgH5Nq9d.jpg",
                "droits" => 1,
            ],
            [
                "prenom" => "James",
                "nom" => "oger",
                "email" => "james@festx.ca",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                "image" => "/storage/uploads/ZBJjoBIXCI8jqaEBgxGHT9Hjh6PYyuw44lBqGdX7.jpg",
                "droits" => 1,
            ],
            [
                "prenom" => "Maxime",
                "nom" => "Normandin-Fortin",
                "email" => "maxime@festx.ca",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                "image" => "/storage/uploads/ls0apStmmIpUGDjFqg4ny189lPkVKrQL9MSKwkwi.jpg",
                "droits" => 1,
            ],
            [
                "prenom" => "Geoffrey",
                "nom" => "Pastor",
                "email" => "geoffrey@festx.ca",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                "image" => "/storage/uploads/AqyxnetNUhOTMGWudhDyqkBu1sT8Ge0kv2X4VfY5.jpg",
                "droits" => 1,
            ],
        ]);

        \App\Models\Admin::factory(5)->create();


        /**************
         * ARTISTES
         **************/
        DB::table('artistes')->insert([
            [
                'nom_scene' => 'Clement',
                'image' => '/storage/uploads/sGffZT1gWSTwcs1TGd2fy1eWHFeGkjIA62jMuwlw.jpg',
                'heure_show' => '20:13:00',
            ],
            [
                'nom_scene' => 'DJ Sneaks',
                'image' => '/storage/uploads/MfyHOSo93w4UEsBfoQt8XgVcjqjPCjvsy1fDMizL.jpg',
                'heure_show' => '21:38:00',
            ],
            [
                'nom_scene' => 'Cassiope',
                'image' => '/storage/uploads/baobKzZS92fvdLi9TgAgM3NUPRScLAuP5YVdCA92.jpg',
                'heure_show' => '21:26:00',
            ],
            [
                'nom_scene' => 'DJ Fool',
                'image' => '/storage/uploads/2JBv9Okm6YLWo63KOHKjy9jFcbUyKJPABfGXmQDP.jpg',
                'heure_show' => '22:43:00',
            ],
            [
                'nom_scene' => 'Tenz',
                'image' => '/storage/uploads/vvilq8BMvlomEA8DEEE6ni3ooyrZ5VL4rpiyq91x.jpg',
                'heure_show' => '23:43:00',
            ],
            [
                'nom_scene' => 'Utopia',
                'image' => '/storage/uploads/DZV8kwJykvZO6chbiPrPwzA9ca1YwRQ8xgRm6IsP.jpg',
                'heure_show' => '20:23:00',
            ],
            [
                'nom_scene' => 'Amanda',
                'image' => '/storage/uploads/wmk6ZfQdWazSK3Ww4gi0etjD3xYP5ie7A3neayFT.jpg',
                'heure_show' => '21:28:00',
            ],
            [
                'nom_scene' => 'dj clark',
                'image' => '/storage/uploads/Rs5zbb7YEt9R3yn328V20mBNb03Lb8V15nuulFow.jpg',
                'heure_show' => '22:54:00',
            ],
            [
                'nom_scene' => 'Fleur bleue',
                'image' => '/storage/uploads/GE6eImeYTwPV06LZiFingFguoYLfkHJWLNjCbPNG.jpg',
                'heure_show' => '23:51:00',
            ],
            [
                'nom_scene' => 'DJ Flexiz',
                'image' => '/storage/uploads/p2Fn1avGeBBDRhwQVm6CLuW7bJELSUkoLXSJnNVv.jpg',
                'heure_show' => '23:56:00',
            ],
            [
                'nom_scene' => 'Sylvano',
                'image' => '/storage/uploads/Kvn47SvR6ykboD2aMLRQn66z3NUEqROOuL3IA3ZX.jpg',
                'heure_show' => '20:57:00',
            ],
            [
                'nom_scene' => 'dj think',
                'image' => '/storage/uploads/ASLsAxDMlZ8zOrsHwNlVv3gc6mi21iODo7oMaCek.jpg',
                'heure_show' => '22:57:00',
            ],
            [
                'nom_scene' => 'filipendule',
                'image' => '/storage/uploads/U0WvWEBwbotSm8V0P0pByurVkOWpBhijjEeuRPYW.jpg',
                'heure_show' => '22:58:00',
            ],
            [
                'nom_scene' => 'Claraz',
                'image' => '/storage/uploads/SC75i80pzuRs0KQFufnPzhIxt2tQWPeDdoeGQhUL.jpg',
                'heure_show' => '23:58:00',
            ],
            [
                'nom_scene' => 'dj awarness',
                'image' => '/storage/uploads/WCo3TIR2azJxnThKhd3JZYwhmmcj8X4JRCV7z2Rm.jpg',
                'heure_show' => '23:51:00',
            ],
        ]);
        /**************
         * SPECTACLES
         **************/
        DB::table('spectacles')->insert([
            [
                'id' => 5,
                'nom' => 'Spectacles',
                'image' => '/storage/uploads/UOeqtJLF81HLFDhOTH7ehtNkNy0IveHCScrksAvT.jpg',
                'heure' => '22:32:00',
            ],
            [
                'id' => 8,
                'nom' => 'Laser light',
                'image' => '/storage/uploads/nfH4wtszdKAZUiDcg9uFpsj9RMdMYPEwF4I6gYuK.jpg',
                'heure' => '23:48:00',
            ],
            [
                'id' => 9,
                'nom' => 'fire show',
                'image' => '/storage/uploads/hpgiVMx7sPt3HeliuB38ChUszRw5QnHnadOkl37u.jpg',
                'heure' => '23:45:00',
            ],
            [
                'id' => 10,
                'nom' => 'drones',
                'image' => '/storage/uploads/il39VIHlVpzWTLS7UNJfS35bI7F5iw1uuBj9RPhp.jpg',
                'heure' => '23:32:00',
            ],
            [
                'id' => 11,
                'nom' => 'concours dj',
                'image' => '/storage/uploads/7vBADsksZe0QDcWKI1mI8qLWFaibznYKlG6Az5ze.jpg',
                'heure' => '23:37:00',
            ],
        ]);



        /**************
         * PROGRAMMATION
         **************/
        DB::table('programmations')->insert([
            'date' => '2024-08-09',
        ]);
        DB::table('programmations')->insert([
            'date' => '2024-08-10',
        ]);
        DB::table('programmations')->insert([
            'date' => '2024-08-11',
        ]);
        /**************
         * ARTISTES PROGRAMMATION
         **************/
        DB::table('artiste_programmation')->insert([
            [
                'id' => 1,
                'artiste_id' => 1,
                'programmation_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'artiste_id' => 2,
                'programmation_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'artiste_id' => 3,
                'programmation_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'artiste_id' => 4,
                'programmation_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'artiste_id' => 5,
                'programmation_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'artiste_id' => 6,
                'programmation_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'artiste_id' => 7,
                'programmation_id' => 3,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 8,
                'artiste_id' => 8,
                'programmation_id' => 3,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 9,
                'artiste_id' => 9,
                'programmation_id' => 3,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 10,
                'artiste_id' => 10,
                'programmation_id' => 3,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 11,
                'artiste_id' => 11,
                'programmation_id' => 3,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 12,
                'artiste_id' => 12,
                'programmation_id' => 3,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 13,
                'artiste_id' => 13,
                'programmation_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 14,
                'artiste_id' => 13,
                'programmation_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 15,
                'artiste_id' => 15,
                'programmation_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        /**************
         * SPECTACLES PROGRAMMATION
         **************/
        DB::table('spectacle_programmation')->insert([
            [
                'id' => 1,
                'spectacle_id' => 5,
                'programmation_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'spectacle_id' => 8,
                'programmation_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'spectacle_id' => 9,
                'programmation_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'spectacle_id' => 10,
                'programmation_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'spectacle_id' => 11,
                'programmation_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
        /**************
         * FORFAITS
         **************/
        DB::table('forfaits')->insert([
            'nom' => 'billet journalier',
            'prix' => '69.99',
            'image' => 'images/dj forfait.png',
        ]);
        DB::table('forfaits')->insert([
            'nom' => '2 jours',
            'prix' => '129.99',
            'image' => 'images/forfait_2_jours.jpg',
        ]);
        DB::table('forfaits')->insert([
            'nom' => '3 jours',
            'prix' => '189.96',
            'image' => 'images/forfait_3_jours.png',
        ]);


        /**************
         * ACTUALITÉS
         **************/
        DB::table('actualites')->insert([

            [
                'id' => 1,
                'date' => '2024-04-18',
                'titre' => 'Préparation du nouveau site !',
                'image' => '/storage/uploads/wy2zMQZj3lmKn5EZUVn4lE4EC0jOKLq3rC7qWLly.jpg',
                'details' => 'Préparez-vous à plonger dans un monde dextase sonore, de lumières éblouissantes et de fête sans fin avec Fest X 2023. Ce festival électro légendaire célèbre sa dixième édition, promettant une expérience inoubliable.Le thème ÉlectroMélodie de lÉté" promet une programmation variée, des rythmes techno à la trance, avec des artistes de renommée mondiale et des talents émergents. Des installations artistiques spectaculaires illumineront le site, et des espaces de détente, une cuisine internationale et des ateliers de danse compléteront lexpérience.Réservez vos billets pour Fest X 2023, lévénement de lété pour les amoureux de la musique électronique.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 2,
                'date' => '2023-11-25',
                'titre' => 'On teste les actus!',
                'image' => '/storage/uploads/u54qV1GeaNhBKMpKVd1tBAZycYy8K6Elcl3ZbzCk.png',
                'details' => 'Strider lasted jambags plans settling lots urged report guess. Effect hands nightly release dealing Faramir meal unto meant misery credit? Reproductions Bracegirdles lad! Knowing debt astray Bag-end? Shroud cloven sulfur Galeton injury pirate burden kicking caves meets ours burned. Swords are no more use here. Wouldnt Guldur quaint comforts. Responsible wake childrens bet Haradrim villager funeral secret required. Woodlands labyrinth Brave bodyguard desire towers uproar penny worlds relatives swimming rides.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 3,
                'date' => '2023-10-05',
                'titre' => 'Actu de fou !',
                'image' => '/logos/centre_color_blanc.png',
                'details' => 'Responsible word measure Thror. I gave you the chance of aiding me willingly, but you have elected the way of pain! Twittering Council rest material saws dump golden? Learn fine suffering courage greatly stew fountains travel Dwarves biggest? Am grief belonging wolves Greenwood ll stove eggs! Sausages decision Fenmarch. Rock wins Ringwraiths shaking fading. Fretting jelly Southrons mellon black-haired someone. Foot smuggler breach lines Gondolin aloft.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
