<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    use HasFactory;

    //Get the random for the breakdown
    public function breakdowns()
    {
        return $this->belongsTo(Random::class);
    }
}
