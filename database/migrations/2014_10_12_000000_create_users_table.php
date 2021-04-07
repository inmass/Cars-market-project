<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique()->nullable();
            $table->string('nom_garage')->nullable();
            $table->string('logo_garage')->nullable();
            $table->string('fixe')->nullable();
            $table->string('fax')->nullable();
            $table->string('ville')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('rc')->nullable();
            $table->integer('if')->nullable();
            $table->integer('ice')->nullable();
            $table->date('pack_end_date')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // special columns
            $table->boolean('super_user')->default(0);
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
