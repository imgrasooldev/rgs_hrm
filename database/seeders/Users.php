<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //     $table->date('joining_date');
        $mytime = Carbon::now();

        $user = User::create([
                'name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'joining_date' =>  $mytime->toDateTimeString(),
            ]);
        $permissions = Permission::create([
            'name' => 'Admin'
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //Roles
        $role = Role::create(['name' => 'HR']);
        $role = Role::create(['name' => 'Production Head']);
        $role = Role::create(['name' => 'Sales']);
        $role = Role::create(['name' => 'Front-end']);
        $role = Role::create(['name' => 'Back-end']);
        $role = Role::create(['name' => 'Content Writing']);
    }
}
