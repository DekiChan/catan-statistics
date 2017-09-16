<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiceRoll extends Model
{
    public static function overallHistory()
    {
        return static::whereNull('color')
                     ->count();
    }
}
