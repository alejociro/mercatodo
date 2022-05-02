<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
      Role::create([
          'name' => 'Usuario',
      ]);

      Role::create([
         'name' => 'Administrador Usuarios'
      ]);

      Role::create([
          'name' => 'Administrador Productos'

      ]);

      Role::create([
          'name' => 'Administrador Roles'
      ]);
    }
}
