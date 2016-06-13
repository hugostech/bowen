<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * type : 1:can do service at same time
         *        2:client need drop off
         *
         * labour: 15 mins as a unit
         *
         * */
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('content');
            $table->enum('type',[1,2]);
            $table->integer('labour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services');
    }
}
