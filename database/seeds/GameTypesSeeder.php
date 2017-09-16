<?php

use Illuminate\Database\Seeder;
use App\GameType;

class GameTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Original' => (object) [
                'player_limit' => 4,
                'score_limit' => 10,
                'third_dice' => false,
            ],
            'Original 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,
                'third_dice' => false,
            ],
            'Seafarers' => (object) [
                'player_limit' => 4,
                'score_limit' => 10,
                'third_dice' => false,
            ],
            'Seafarers 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,
                'third_dice' => false,
            ],
            'Cities & Knights' => (object) [
                'player_limit' => 4,
                'score_limit' => 13,
                'third_dice' => true,
            ],
            'Cities & Knights 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 13,
                'third_dice' => true,
            ],
            'Traders & Barbarians' => (object) [
                'player_limit' => 4,
                'score_limit' => 10,
                'third_dice' => false,
            ],
            'Traders & Barbarians 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,
                'third_dice' => false,
            ],
            'Explorers & Pirates' => (object) [
                'player_limit' => 4,
                'score_limit' => 13,
                'third_dice' => false,
            ],
            'Explorers & Pirates 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 13,
                'third_dice' => false,
            ],
            'Custom' => (object) [
                'player_limit' => 6,
                'score_limit' => 17,
                'third_dice' => false,
            ],
        ];

        foreach ($types as $name => $rules) {
            GameType::create([
                'name' => $name,
                'player_limit' => $rules->player_limit,
                'score_limit' => $rules->score_limit,
                'third_dice' => $rules->third_dice,
            ]);
        }
    }
}
