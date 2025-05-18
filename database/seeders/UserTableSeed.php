<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $super_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'password'=> Hash::make('password'),
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('password'),
        ]);

        //create role
       $role = Role::create(['name'=>'admin']);

       //assign permission to role
       $permission = Permission::pluck('id')->all();
       $role->syncPermissions($permission);

       //assign role to user
       $super_admin->assignRole($role);
       $admin->syncRoles($role);

    }
}
