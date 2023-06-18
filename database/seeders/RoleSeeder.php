<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            ['name' => 'Super Admin'],
            ['name' => 'Teacher'],
            ['name' => 'Staff'],
            ['name' => 'Admin'],
            ['name' => 'Vice Principal'],
            ['name' => 'Principal'],
            ['name' => 'Student'],
            ['name' => 'Parent'],
            ['name' => 'Owner'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // config/permission.php
        foreach (config('permission.list') as $permission) {
            foreach ($permission['access'] as $access) {
                Permission::create(['name' => $access]);
            }
        }

        // super admin
        $role = Role::findByName('Super Admin');
        $role->givePermissionTo(Permission::all()->pluck('name'));
    }
}
