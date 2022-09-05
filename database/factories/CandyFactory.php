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
        $name = $this->faker->text(10);
        $sku = generateSKU();
        return [
            'name' => $name,
            'sku' => $sku,
            'price' => $this->faker->numerify('##.##'),
            'details' => $this->faker->text(30),
        ];
    }
}
