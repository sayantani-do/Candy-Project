<?php

namespace Database\Seeders;

use App\Models\Candy;
use Illuminate\Database\Seeder;

class CandySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candy::factory()->count(10)->create();
    }
}
