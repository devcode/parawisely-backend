<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_place', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->integer('creator_id');
            $table->string('name_place');
            $table->string('address');
            $table->integer('provinsi_id');
            $table->integer('kabupaten_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('description');
            $table->string('image');
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
        Schema::dropIfExists('tb_travel_place');
    }
}
