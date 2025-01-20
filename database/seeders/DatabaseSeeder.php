<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);
        // User::factory(10)->create();

        $admin = User::find(1); // Reemplaza con el ID del administrador
        if ($admin) {
            $admin->assignRole('administrador');
        }

        // Puedes asignar roles a más usuarios según sea necesario
        $moderator = User::find(2); // Reemplaza con el ID del moderador
        if ($moderator) {
            $moderator->assignRole('moderador');
        }
    }
}
