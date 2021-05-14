<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('headline')->nullable();
            $table->string('sub_headline')->nullable();
            $table->string('thumbnail')->nullable();
            $table->mediumText('text')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('featured')->default(0);
            $table->mediumText('tags')->nullable();
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
