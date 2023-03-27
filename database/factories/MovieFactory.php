<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
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
            'name' => $this->faker->movie(),
            'publication_status' => $this->faker->boolean(),
            'poster_path' =>  $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
