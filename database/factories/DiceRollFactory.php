<?php

use Faker\Generator as Faker;
use App\Game;

$factory->define(App\DiceRoll::class, function (Faker $faker) {
    $game = Game::getRandomRecord();

    $colors = [ null ];

    if ($game->type->hasThirdDice()) {
        $colors = [
            'blue',
            'green',
            'yellow',
            'ship',
            'ship',
            'ship',
        ];
    }

    return [
        'value' => rand(2, 12),
        'color' => $colors[rand(0, count($colors) - 1)],
        'game_id' => $game->id,
    ];
});
