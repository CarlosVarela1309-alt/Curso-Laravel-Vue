<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);

        // Crear permisos
        $permission_create_role = Permission::create(['name' => 'create role']);
        $permission_read_role = Permission::create(['name' => 'read role']);
        $permission_update_role = Permission::create(['name' => 'update role']);
        $permission_delete_role = Permission::create(['name' => 'delete role']);

        $permission_create_lesson = Permission::create(['name' => 'create lesson']);
        $permission_read_lesson = Permission::create(['name' => 'read lesson']);
        $permission_update_lesson = Permission::create(['name' => 'update lesson']);
        $permission_delete_lesson = Permission::create(['name' => 'delete lesson']);

        $permission_create_category = Permission::create(['name' => 'create category']);
        $permission_read_category = Permission::create(['name' => 'read category']);
        $permission_update_category = Permission::create(['name' => 'update category']);
        $permission_delete_category = Permission::create(['name' => 'delete category']);

        $permission_admin = [
            $permission_create_role,
            $permission_read_role,
            $permission_update_role,
            $permission_delete_role,
            $permission_create_lesson,
            $permission_read_lesson,
            $permission_update_lesson,
            $permission_delete_lesson,
            $permission_create_category,
            $permission_read_category,
            $permission_update_category,
            $permission_delete_category,
        ];

        $permission_adminEditor = [
            $permission_create_lesson,
            $permission_read_lesson,
            $permission_update_lesson,
            $permission_delete_lesson,
            $permission_create_category,
            $permission_read_category,
            $permission_update_category,
            $permission_delete_category,
        ];

        $role_admin->syncPermissions($permission_admin);
        $role_editor->syncPermissions($permission_adminEditor);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
