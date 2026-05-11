<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);

        // Create permissions
        $permissions = [
            'manage-pages',
            'manage-posts',
            'manage-categories',
            'manage-galleries',
            'manage-media',
            'manage-admissions',
            'manage-contacts',
            'manage-settings',
            'manage-users',
            'view-analytics',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Assign all permissions to super-admin
        $superAdmin = Role::findByName('super-admin');
        $superAdmin->syncPermissions(Permission::all());

        // Assign some permissions to editor
        $editor = Role::findByName('editor');
        $editor->syncPermissions([
            'manage-pages',
            'manage-posts',
            'manage-categories',
            'manage-galleries',
            'manage-media',
        ]);
    }
}
