<?php

use Faker\Generator as Faker;
use App\Game;

$factory->define(App\DiceRoll::class, function (Faker $faker) {
    $colors = [
        'blue',
        'green',
        'yellow',
        'ship'
    ];

    $gameId = Game::getRandomRecordProperty('id');

    return [
        'value' => rand(2, 12),
        'color' => $colors[rand(0, 3)],
        'game_id' => $gameId,
    ];
});
