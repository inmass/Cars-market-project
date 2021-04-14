<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            //relationships
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('particular_id')->nullable()->unique();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreign('particular_id')->references('id')->on('particulars')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //relationships
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('particular_id')->nullable()->unique();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreign('particular_id')->references('id')->on('particulars')->onDelete('cascade')->nullable();
        });
    }
}
