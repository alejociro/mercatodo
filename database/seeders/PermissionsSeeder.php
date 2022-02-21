<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'see-rol',
            'create-rol',
            'edit-rol',
            'delete-rol',
            'see-user',
            'create-user',
            'edit-user',
            'delete-user',
            'see-product',
            'create-product',
            'edit-product',
            'delete-product',
            'see-category',
            'create-category',
            'edit-category',
            'delete-category'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }
    }
}
