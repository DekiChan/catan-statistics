<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Utils\Traits\ReturnsRandomRecord;
use App\DiceRoll;
use App\GameType;
use App\GameScore;

class Game extends Model
{
    use ReturnsRandomRecord;

    public function type() : BelongsTo
    {
        return $this->belongsTo(GameType::class, 'game_type_id');
    }

    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function host() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function diceRolls() : HasMany
    {
        return $this->hasMany(DiceRoll::class);
    }

    public function scores() : HasMany
    {
        return $this->hasMany(GameScore::class);
    }
}
