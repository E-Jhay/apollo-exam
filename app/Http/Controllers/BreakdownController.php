<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breakdown;
use App\Models\Random;
use Faker\Generator as Faker;

class BreakdownController extends Controller
{
    //Get Random data
    public function index()
    {
        return Breakdown::select('value')->get();
    }

    //Store Breakdown data
    public function store(Faker $faker)
    {
        //Generate random items to breakdown table
        $randomNumber = rand(5, 10);
        for($i = 0; $i < $randomNumber; $i++){
            Breakdown::create([
                'value' => $faker->regexify('[A-Za-z0-9]{5}'),
                'random_id' => Random::all()->random()->id,
            ]);
        }

        return response()->json([
            'message' => 'Breakdowns added successfull'
        ]);
    }
    //Delete Breakdown data
    public function destroy()
    {
        //Delete random items to breakdown table
        $random_number_array = range(5, 10);
        shuffle($random_number_array );
        $random_number_array = array_slice($random_number_array ,0,10);
        Breakdown::whereIn('id', $random_number_array)->delete();

        return $random_number_array;
    }
}
