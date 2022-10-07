<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Random;

class RandomController extends Controller
{
    //Get Random data
    public function index()
    {

        return Random::select('value')->get();
    }
}
