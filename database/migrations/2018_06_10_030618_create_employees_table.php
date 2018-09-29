<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('name');
            $table->string('nrc');
            $table->string('account_no');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('status_id');
            $table->boolean('gender');
            $table->date('dob');
            $table->string('email');
            $table->string('phone_no');
            $table->string('address');
            $table->date('start_date');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
}
