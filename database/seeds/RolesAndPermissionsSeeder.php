<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions for events
        Permission::create(['name' => 'schedule game']);
        Permission::create(['name' => 'cancel scheduled game']);
        Permission::create(['name' => 'manage game']);
        Permission::create(['name' => 'edit history']);

        // administration
        Permission::create(['name' => 'manage users']);

        $permissions = Permission::all()->pluck('id', 'name');
        $adminPermissions = $permissions->keys()->toArray();
        $editorPermissions = $permissions->except('manage users')->keys()->toArray();
        $playerPermissions = $permissions->except('manage users', 'edit history')->keys()->toArray();

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo($adminPermissions);

        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo($editorPermissions);

        $role = Role::create(['name' => 'player']);
        $role->givePermissionTo($playerPermissions);
    }
}
