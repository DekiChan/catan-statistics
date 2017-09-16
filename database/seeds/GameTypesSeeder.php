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
                'score_limit' => 10,],
            'Original 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,],
            'Seafarers' => (object) [
                'player_limit' => 4,
                'score_limit' => 10,],
            'Seafarers 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,],
            'Cities & Knights' => (object) [
                'player_limit' => 4,
                'score_limit' => 10,],
            'Cities & Knights 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,],
            'Traders & Barbarians' => (object) [
                'player_limit' => 4,
                'score_limit' => 10,],
            'Traders & Barbarians 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,],
            'Explorers & Pirates' => (object) [
                'player_limit' => 4,
                'score_limit' => 10,],
            'Explorers & Pirates 6' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,],
            'Custom' => (object) [
                'player_limit' => 6,
                'score_limit' => 10,],
        ];

        foreach ($types as $name => $limits) {
            GameType::create([
                'name' => $name,
                'player_limit' => $limits->player_limit,
                'score_limit' => $limits->score_limit,
            ]);
        }
    }
}
