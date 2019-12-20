<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheatreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theatre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('theatre_name');
            $table->String('theatre_image')->nullable();
            $table->text('description');
            $table->String('location');
            $table->String('contact_no');
            $table->String('cinemas');
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
        Schema::dropIfExists('theatre');
    }
}
