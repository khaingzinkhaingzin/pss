<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('category');
            $table->string('image');
            $table->string('model');
            $table->string('display');
            $table->string('network');
            $table->string('connection');
            $table->string('front_camera');
            $table->string('back_camera');
            $table->string('android_version');
            $table->string('color');
            $table->string('storage');
            $table->string('RAM');
            $table->integer('price');
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
        Schema::dropIfExists('phone_details');
    }
}