<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class GivePermissionsSeeder extends Seeder
{
    public function run(): void
    {
      $role = Role::findByName('Administrador Usuarios');
      $role->givePermissionTo('see-user','edit-user','delete-user','create-user');

      $role = Role::findByName('Administrador Productos');
      $role->givePermissionTo('see-product','edit-product','delete-product','create-product');

      $role = Role::findByName('Administrador Roles');
      $role->givePermissionTo('see-rol','edit-rol','delete-rol','create-rol');
    }
}
