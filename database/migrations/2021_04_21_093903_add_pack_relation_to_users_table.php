<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPackRelationToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // relationships
            $table->unsignedBigInteger('pack_id')->default(1)->nullable();
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('pack_id')->default(1)->nullable();
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('set null');
        });
    }
}
