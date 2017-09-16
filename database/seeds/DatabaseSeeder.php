<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GameTypesSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(GameScoreSeeder::class);
        $this->call(DiceRollSeeder::class);
    }
}
