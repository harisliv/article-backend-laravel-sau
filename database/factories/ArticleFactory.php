<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     
    public function definition()
    {
        $randImg = "https://picsum.photos/".rand(0,200);
        return [
            'name' => $this->faker->unique()->name,
            'category' => $this->faker->randomElement(['economy' ,'sports', 'lifestyle']),
            'published' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'description' => $this->faker->text(), 
            'image' => $randImg, 
        ];
    }
}
