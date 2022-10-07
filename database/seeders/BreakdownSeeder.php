<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Breakdown;
use App\Models\Random;
use Faker\Generator as Faker;

class BreakdownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Generate random items to breakdown table
        $randomNumber = rand(5, 10);
        for($i = 0; $i < $randomNumber; $i++){
            Breakdown::create([
                'value' => $faker->regexify('[A-Za-z0-9]{5}'),
                'random_id' => Random::all()->random()->id,
            ]);
        }
    }
}
