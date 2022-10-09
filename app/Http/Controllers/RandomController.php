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
        $count = Random::count();
        //Add items to database if number of rows is less than 75
        if($count < 75){
            $randomNumber = rand(5, 10);
            for($i = 0; $i < $randomNumber; $i++){
                Random::create([
                    'value' => $faker->word,
                ]);
            }

            return response()->json([
                'message' => $randomNumber. ' Randoms added successfully'
            ]);
        }

        return response()->json([
            'message' => 'No more space for adding items'
        ]);
    }

    //Delete Breakdown data
    public function destroy()
    {
        //Delete 1 - numberOfRows items to random table
        $count = Random::count();
        $randomNumber = rand(1, ($count < 15) ? $count : 15);
        Random::inRandomOrder()
            ->limit($randomNumber)
            ->delete();

        return response()->json([
            'message' => $randomNumber. ' rows deleted from random table'
        ]);
    }
}
