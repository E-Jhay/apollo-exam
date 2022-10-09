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
        $count = Breakdown::count();
        //Add items to database if number of rows is less than 75
        if($count < 75){
            $randomNumber = rand(5, 10);
            for($i = 0; $i < $randomNumber; $i++){
                Breakdown::create([
                    'value' => $faker->regexify('[A-Za-z0-9]{5}'),
                    'random_id' => Random::all()->random()->id,
                ]);
            }

            return response()->json([
                'message' => $randomNumber. ' Breakdowns added successfully'
            ]);
        }

        return response()->json([
            'message' => 'No more space for adding items'
        ]);
    }
    //Delete Breakdown data
    public function destroy()
    {
        //Delete 1 - numberOfRows items to breakdown table
        $count = Breakdown::count();
        $randomNumber = rand(1, ($count < 15) ? $count : 15);
        Breakdown::inRandomOrder()
            ->limit($randomNumber)
            ->delete();

        return response()->json([
            'message' => $randomNumber. ' rows deleted from breakdown table'
        ]);
    }
}
