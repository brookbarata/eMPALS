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
        Schema::create('found_person', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('police_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('police_id')->references('id')->on('police_volunteers')->onDelete('cascade');            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->integer('age');
            $table->string('gender');
            $table->string('brith_place');
            $table->string('nick_name')->nullable();
            $table->double('height', 15, 8)->unsigned();
            $table->double('weight', 15, 8)->unsigned();
            $table->string('region');
            $table->string('city');
            $table->string('sub_city');
            $table->string('street_name');
            $table->string('house_no');
            $table->string('special_description');
            $table->string('photo')->nullable();
            $table->boolean('confirmed')->nullable()->default(false);
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
        Schema::dropIfExists('found_person');
    }
};
