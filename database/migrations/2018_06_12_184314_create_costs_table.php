<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_type');
            $table->string('category');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('cost');
            $table->boolean('sale_or_service');
            $table->string('day');
            $table->string('month_year');
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
        Schema::dropIfExists('costs');
    }
}
