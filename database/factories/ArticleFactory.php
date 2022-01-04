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
        return [
            'name' => $this->faker->unique()->name,
            'categoryId' => $this->faker->numberBetween($min = 1, $max = 6),
            'published' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'description' => $this->faker->text(), 
            'image' => $this->faker->imageUrl($width = 50, $height = 50, 'article'), 
        ];
    }
}
