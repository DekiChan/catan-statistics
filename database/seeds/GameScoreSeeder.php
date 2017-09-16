<?php

use Illuminate\Database\Seeder;
use App\GameScore;
use App\Game;
use App\GameType;
use App\User;

class GameScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = Game::with(['type'])->get();
        $gameScores = [];

        $games->each(function ($game) {
            $players = $this->getPlayerIds($game->type);
            $this->createScores($game, $players);
        });
    }

    private function getPlayerIds(GameType $type) : array
    {
        $playersMissing = rand(0, 1);
        $playersCount = $type->player_limit - $playersMissing;
        
        return User::getManyRandomRecordsProperty($playersCount, 'id')->toArray();
    }

    private function createScores(Game $game, array $playerIds) : void
    {
        $winningPoints = $game->type->score_limit;
        $playerCount = count($playerIds);
        $idx = 0;

        for ($idx = 0; $idx < $playerCount; $idx++) {
            $playerId = $playerIds[$idx];

            GameScore::create([
                'user_id' => $playerId,
                'game_id' => $game->id,
                'points' => $idx == 0 ? $winningPoints : ($winningPoints - rand(1, $winningPoints - 2)),
            ]);
        }

        return;
    }
}
