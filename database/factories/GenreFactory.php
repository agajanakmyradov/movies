<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($this->faker));
        return [
            'name' => $this->faker->unique()->movieGenre(),
        ];
    }
}
