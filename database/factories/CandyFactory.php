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
        // $sku = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
        $randnum    = rand(1111,9999);
        $curdate    = date('Ymd');
        $sku = 'SKU-'.$randnum.'-'.$curdate;
        return [
            'name' => $name,
            'sku' => $sku,
            'price' => $this->faker->numerify('##.##'),
            'details' => $this->faker->text(30),
        ];
    }
}
