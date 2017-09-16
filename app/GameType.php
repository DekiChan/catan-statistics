<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Utils\Traits\ReturnsRandomRecord;

class GameType extends Model
{
    use ReturnsRandomRecord;

    public function hasThirdDice() : bool
    {
        return $this->third_dice;
    }
}
