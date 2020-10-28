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
            $table->integer('island_id')->nullable();
            $table->string('name_place');
            $table->string('slug');
            $table->string('address', 255);
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('description', 999);
            $table->string('image');
            $table->integer('is_active')->default(null);
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
