<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create default admin
        $admin = User::create([
            'name' => 'dekichan',
            'email' => 'dvlp.chan@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $admin->assignRole('admin');

        // create default editor
        $editor = User::create([
            'name' => 'editor',
            'email' => 's0nceek@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $editor->assignRole('editor');

        // create default player
        $player = User::create([
            'name' => 'player',
            'email' => 'playa@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $player->assignRole('player');

        $roles = Role::all()
                     ->pluck('id', 'name')
                     ->except('admin')
                     ->keys()
                     ->toArray();

        // create a few random editors and players
        factory(App\User::class, 15)->create()->each(function ($u) use ($roles) {
            $rnd = rand(0, count($roles)-1);
            $u->assignRole($roles[$rnd]);
        });
    }
}
