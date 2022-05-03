<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MeetPerson>
 */
class MeetPersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
                'fname'=>$this->faker->firstname(),
                'mname'=>$this->faker->lastname(),
                'lname'=>$this->faker->lastname(),
                'age'=>$this->faker->numberBetween(25, 50),
                'gender'=>$this->faker->randomElement( ["male", "female", "others"]),
                'region'=>$this->faker->address(),
                'city'=>$this->faker->city(),
                'sub_city'=>$this->faker->city(),
                'photo'=>$this->faker->image(),
            // $table->bigInteger('user_id')->unsigned()->nullable();
            // $table->bigInteger('police_id')->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('police_id')->references('id')->on('police_volunteers'); 
            // $table->string('fname');
            // $table->string('mname');
            // $table->string('lname');
            // $table->integer('age');
            // $table->string('gender');
            // $table->string('region');
            // $table->string('city');
            // $table->string('sub_city');
            // $table->string('photo');
        ];
    }
}
