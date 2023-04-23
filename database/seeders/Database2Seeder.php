<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class Database2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role5 = Role::create(['name' => 'admins']);
        $role5->givePermissionTo('edit comments');
        $role5->givePermissionTo('delete comments');
        $role5->givePermissionTo('create comments');
    }
}
