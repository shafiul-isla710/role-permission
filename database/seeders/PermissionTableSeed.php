<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            'user-menu',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-menu',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-menu',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
        ];

        foreach($permission as $perm){
            Permission::create(['name' => $perm]);
        }
    }
}
