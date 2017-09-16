<?php

use Illuminate\Database\Seeder;

class DiceRollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DiceRoll::class, 4000)->create();
    }
}
