<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('movie_name');
            $table->foreign('movie_name')->references('id')->on('movies');
            $table->string('user_name');
            $table->foreign('user_name')->references('id')->on('users');
            $table->string('title');
            $table->text('review');
            $table->string('rating');
            $table->boolean('reviewedByAdmin')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
