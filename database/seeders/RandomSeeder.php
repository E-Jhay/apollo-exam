<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Random;
use Faker\Generator as Faker;

class RandomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Generate random items to random table
        $randomNumber = rand(5, 10);
        for($i = 0; $i < $randomNumber; $i++){
            Random::create([
                'value' => $faker->name,
            ]);
        }
    }
}
