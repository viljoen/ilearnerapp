<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /*
             * using php faker to generate data
             * 'name' => $this->faker->name(),
             * 'email' =>$this->faker->unique()->safeEmail(),
             * 'email_verified_at' => now(),
             * 'password'=> Hash::make('password'),
             * 'remember_token' => Str::random(10),
             * You need to import the string (Str) class
             * use\Illuminate\Support\Str;
             * $faker->name
             * $faker->text
             * $faker->paragraphs()
             * $faker->sentences()
             */
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
