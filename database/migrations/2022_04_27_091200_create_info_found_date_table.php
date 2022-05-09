<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_found_date', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('found_id')->unsigned()->nullable();
            $table->foreign('found_id','found_id')->references('id')->on('found_person')->onDelete('cascade');
            $table->date('date');
            $table->string('city');
            $table->string('sub_city');
            $table->string('skin_color');
            $table->string('clothe');
            $table->string('glass')->nullable();
            $table->string('shoes');
            $table->string('health_condition');
            $table->string('medical_problem')->nullable();
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
        Schema::dropIfExists('info_found_date');
    }
};
