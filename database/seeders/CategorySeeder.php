<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Tecnologia',
            'description' => 'Aca van los celulares y consolas de video juegos'
        ]);

        Category::create([
            'name' => 'Hogar y moda',
            'description' => 'Aca van los muebles, sillas y decoraciones'
        ]);

        Category::create([
            'name' => 'Cocina',
            'description' => 'Aca van los todos los objetos necesarios para la cocina'
        ]);

        Category::create([
            'name' => 'Ropa',
            'description' => 'Aca van camisas, pantalones, zapatos y demas'
        ]);

        Category::create([
            'name' => 'accesorios',
            'description' => 'Aca van los relojes relojes relojes relojes'
        ]);
    }
}
