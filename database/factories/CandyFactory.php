<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CandyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'details' => $this->faker->text(30),
        ];
    }
}
