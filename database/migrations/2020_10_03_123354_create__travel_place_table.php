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
        Schema::create('tb_travel_place', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->integer('creator_id');
            $table->string('name_place', 255);
            $table->string('address', 999);
            $table->integer('provinsi_id', 25);
            $table->integer('kabupaten_id', 25);
            $table->integer('kecamatan_id', 25);
            $table->integer('kelurahan_id', 25);
            $table->string('latitude', 999);
            $table->string('longitude', 999);
            $table->string('description', 999);
            $table->string('image', 999);
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
