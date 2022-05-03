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
        Schema::create('info_missing_date', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('missing_id')->unsigned()->nullable();
            $table->foreign('missing_id')->references('id')->on('missing_person')->onDelete('cascade');
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
        Schema::dropIfExists('info_missing_date');
    }
};
