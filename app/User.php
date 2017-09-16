<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;
use App\Utils\Traits\ReturnsRandomRecord;
use App\Game;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use ReturnsRandomRecord;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gamesCreated() : HasMany
    {
        return $this->hasMany(Game::class, 'creator_id');
    }

    public function gamesHosted() : HasMany
    {
        return $this->hasMany(Game::class, 'host_id');
    }

    // not exactly like this
    // public function gamesWon() : HasMany
    // {
    //     return $this->hasMany(GameScore::class, 'winner_id');
    // }
}
