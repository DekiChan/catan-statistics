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

    // rand(0, 12) was wrong, because we have two 6-sided
    // dice and not one 12-sided
    $value = rand(1, 6) + rand(1, 6);

    return [
        'value' => $value,
        'color' => $colors[rand(0, count($colors) - 1)],
        'game_id' => $game->id,
    ];
});
