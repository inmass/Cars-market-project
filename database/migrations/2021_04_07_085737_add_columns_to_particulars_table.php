<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('particulars', function (Blueprint $table) {
            // relationships
            $table->unsignedBigInteger('car_id')->nullable()->unique();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('particulars', function (Blueprint $table) {
            // relationships
            $table->unsignedBigInteger('car_id')->nullable()->unique();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade')->nullable();
        });
    }
}
