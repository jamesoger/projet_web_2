<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('admin');
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('image');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('droits');
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
        Schema::dropIfExists('admins');
    }
}
