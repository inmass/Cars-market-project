<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumText('images')->nullable();
            $table->string('marque');
            $table->string('modele');
            $table->string('version');
            $table->string('carburant');
            $table->string('boite_de_vitesse');
            $table->string('annee_mise_en_circulation');
            $table->string('dedouane');
            $table->string('kilometrage');
            $table->string('couleur');
            $table->string('carrosserie');
            $table->string('portes');
            $table->string('puissance_fiscale');
            $table->boolean('premiere_main');
            $table->boolean('garantie');
            $table->string('prix');
            $table->mediumText('options'); //will be stored as a serialized array from checkboxes value

            // special columns
            $table->boolean('available')->default(1);
            $table->boolean('visible')->default(1);
            $table->string('token')->unique()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
