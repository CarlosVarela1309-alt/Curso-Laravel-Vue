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
        // 1. Crear o recuperar roles sin duplicar
        $role_admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $role_editor = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);

        // 2. Lista de permisos completamente limpia
        $permissions = [
            'create role', 'read role', 'update role', 'delete role',
            'create lesson', 'read lesson', 'update lesson', 'delete lesson',
            'create category','read category', 'update category', 'delete category',
        ];

        $storedPermissions = [];

        // 3. Crear permisos sin espacios raros
        foreach ($permissions as $permname) {
            $storedPermissions[$permname] = Permission::firstOrCreate(
                ['name' => $permname, 'guard_name' => 'web']
            );
        }

        // 4. Asignar permisos correctos a admin
        $role_admin->syncPermissions([
            $storedPermissions['create role'],
            $storedPermissions['read role'],
            $storedPermissions['update role'],
            $storedPermissions['delete role'],
            $storedPermissions['create lesson'],
            $storedPermissions['read lesson'],
            $storedPermissions['update lesson'],
            $storedPermissions['delete lesson'],
            $storedPermissions['create category'],
            $storedPermissions['read category'],
            $storedPermissions['update category'],
            $storedPermissions['delete category'],
        ]);

        // 5. Asignar permisos correctos a editor
        $role_editor->syncPermissions([
            $storedPermissions['create lesson'],
            $storedPermissions['read lesson'],
            $storedPermissions['update lesson'],
            $storedPermissions['delete lesson'],
            $storedPermissions['create category'],
            $storedPermissions['read category'],
            $storedPermissions['update category'],
            $storedPermissions['delete category'],
        ]);
    }
}
