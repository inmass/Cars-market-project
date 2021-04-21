<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('boutique_en_ligne')->nullable();
            $table->boolean('espace_de_gestion_boutique')->nullable();
            $table->boolean('table_de_bord_boutique')->nullable();
            $table->boolean('pages_descriptifs_de_la_boutique')->nullable();
            $table->string('nombre_de_voitures')->nullable();
            $table->string('acces_aux_annonce_particuliers')->nullable();
            $table->boolean('position_gps')->nullable();
            $table->string('bannieres')->nullable();
            $table->boolean('charte_visuel')->nullable();
            $table->boolean('email_pro')->nullable();
            $table->boolean('gestion_des_commandes')->nullable();
            $table->boolean('service_acceuil_telephonique')->nullable();
            $table->boolean('transfert_des_leads_vers_showroom')->nullable();
            $table->boolean('partage_de_la_liste_des_leads')->nullable();
            $table->string('prise_des_photos_des_voitures')->nullable();
            $table->string('videos_promo')->nullable();
            $table->string('fiches_techniques')->nullable();
            $table->boolean('assistnace')->nullable();
            $table->boolean('conseil_et_accompagnement')->nullable();
            $table->boolean('identite_visuelle')->nullable();
            $table->string('flag')->nullable();
            $table->string('cartes')->nullable();
            $table->string('pub_rs')->nullable();
            $table->string('interviews_showroom')->nullable();
            $table->boolean('logo_flyers')->nullable();
            $table->boolean('logo_acceuil')->nullable();
            $table->boolean('logo_panneau')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packs');
    }
}
