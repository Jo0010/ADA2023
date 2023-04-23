<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit comments']);
        Permission::create(['name' => 'delete comments']);
        Permission::create(['name' => 'create comments']);

        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'delete projects']);
        Permission::create(['name' => 'create projects']);

        Permission::create(['name' => 'delete images']);
        Permission::create(['name' => 'create images']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('edit comments');
        $role1->givePermissionTo('delete comments');
        $role1->givePermissionTo('create comments');

        $role2 = Role::create(['name' => 'Super-Admin']);

        (new Database2Seeder())->run();

    }
}
