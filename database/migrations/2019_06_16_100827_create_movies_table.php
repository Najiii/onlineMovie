<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('title');
            $table->longText('description');
            $table->String('director');
            $table->String('release');
            $table->String('genre');
            $table->String('language');
            $table->String('trailer_link');
            $table->String('poster')->nullable();
            $table->String('picture_1')->nullable();
            $table->String('picture_2')->nullable();
            $table->String('picture_3')->nullable();
            $table->String('picture_4')->nullable();
            $table->String('picture_5')->nullable();
            $table->String('picture_6')->nullable();
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
        Schema::dropIfExists('movies');
    }
}
