<?php

use Faker\Generator as Faker;
use App\User;
use App\Game;
use App\GameType;
use Carbon\Carbon;

$factory->define(Game::class, function (Faker $faker) {
    $gameTypeId = GameType::getRandomRecordProperty('id');
    $creatorId = User::getRandomRecordProperty('id');
    $hostId = User::getRandomRecordProperty('id');

    // create random start and finish timestamps
    $now = Carbon::now();

    $offsetInDays = rand(1, 1000);
    $offsetInSeconds = rand(60 * 60, 24 * 60 * 60);
    $gameDuration = rand(60 * 60, 4 * 60 * 60);

    $start = (Carbon::now())->subDays($offsetInDays)
                            ->subSeconds($offsetInSeconds);
    
    $end = $start->addSeconds($gameDuration);

    return [
        'game_type_id' => $gameTypeId,
        'creator_id' => $creatorId,
        'host_id' => $hostId,
        'started_at' => $start,
        'finished_at' => $end,
        'note' => rand(0, 10) > 5 ? $faker->paragraph : null,
    ];
});
