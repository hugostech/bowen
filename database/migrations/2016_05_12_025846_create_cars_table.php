<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('plate');
            $table->integer('user_id');

            $table->string('make');
            $table->string('model')->nullable();
            $table->string('vin_number')->nullable();
            $table->string('chassis_number')->nullable();
            $table->string('color')->nullable();
            $table->string('color_code')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('engine_code')->nullable();
            $table->string('transmission_type')->nullable();
            $table->string('transmission_code')->nullable();
            $table->string('tire_size')->nullable();
            $table->string('body_style')->nullable();
            $table->integer('fuel_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Cars');
    }
}
