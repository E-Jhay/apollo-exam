<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breakdown;

class BreakdownController extends Controller
{
    //Get Random data
    public function index()
    {
        return Breakdown::all();
    }
}
