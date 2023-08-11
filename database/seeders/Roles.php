<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $role = Role::create(['name' => 'admin']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // $permission = Permission::create(['name' => 'edit articles']);
    }
}
