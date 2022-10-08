<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Random;
use Faker\Generator as Faker;

class RandomController extends Controller
{
    //Get Random data
    public function index()
    {
        return Random::select('value')->get();
    }
    
    //Store Random data
    public function store(Faker $faker)
    {
        //Generate random items to random table
        $randomNumber = rand(5, 10);
        for($i = 0; $i < $randomNumber; $i++){
            Random::create([
                'value' => $faker->name,
            ]);
        }

        return response()->json([
            'message' => 'Randoms added successfull'
        ]);
    }

    //Delete Breakdown data
    public function destroy()
    {
        //Delete random items to breakdown table
        $random_number_array = range(5, 10);
        shuffle($random_number_array );
        $random_number_array = array_slice($random_number_array ,0,10);
        $sample = Random::where('id',1)->delete();

        return $sample;
    }
}
