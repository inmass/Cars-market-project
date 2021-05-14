<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->mediumText('text')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('car_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('set null')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
