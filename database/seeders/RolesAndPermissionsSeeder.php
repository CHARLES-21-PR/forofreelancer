<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'manage users']);
        Permission::firstOrCreate(['name' => 'create posts']);
        Permission::firstOrCreate(['name' => 'create comments']);
        Permission::firstOrCreate(['name' => 'delete posts']);
        Permission::firstOrCreate(['name' => 'delete comments']);
        Permission::firstOrCreate(['name' => 'view cruds']);
        Permission::firstOrCreate(['name' => 'react post']);
        

        // Crear roles y asignar permisos
        $adminRole = Role::firstOrCreate(['name' => 'administrador']);
        $adminRole->givePermissionTo(['manage users', 'create posts', 'delete posts', 'create comments', 'delete comments', 'view cruds', 'react post']);

        $moderatorRole = Role::firstOrCreate(['name' => 'moderador']);
        $moderatorRole->givePermissionTo(['create posts', 'delete posts', 'create comments', 'delete comments', 'react post']);

        $delegateRole = Role::firstOrCreate(['name' => 'delegado']);
        $delegateRole->givePermissionTo(['create posts', 'create comments', 'delete posts', 'delete comments', 'react post']);

        $userRole = Role::firstOrCreate(['name' => 'usuario']);
        $userRole->givePermissionTo(['create posts', 'create comments', 'delete posts', 'delete comments', 'react post']);

        $guestRole = Role::firstOrCreate(['name' => 'invitado']);
        
        $admin = User::find(1); // Reemplaza con el ID del administrador
        if ($admin) {
            $admin->assignRole('administrador');
        }

        // Puedes asignar roles a más usuarios según sea necesario
        $moderator = User::find(2); // Reemplaza con el ID del moderador
        if ($moderator) {
            $moderator->assignRole('moderador');
        }

        // Asigna roles a otros usuarios si es necesario
        $delegate = User::find(3); // Reemplaza con el ID del delegado
        if ($delegate) {
            $delegate->assignRole('delegado');
        }

        $user = User::find(4); // Reemplaza con el ID del usuario
        if ($user) {
            $user->assignRole('usuario');
        }
    }
}
