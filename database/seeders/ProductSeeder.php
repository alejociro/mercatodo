<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Play 5',
            'image' => '20220319230734.jpg',
            'price' => '500000',
            'stock' => '200',
            'description' => 'Soy un play muy pro y muy blanco',
            'category_id' => '1'
        ]);

        Product::create([
            'name' => 'Iphone 13',
            'image' => '20220228163745.jpeg',
            'price' => '800000',
            'stock' => '300',
            'description' => 'Soy un iphone muy pro y muy blanco',
            'category_id' => '1'
        ]);

        Product::create([
            'name' => 'Sofa cama',
            'image' => '20220319230734.jpg',
            'price' => '300000',
            'stock' => '250',
            'description' => 'Soy un sofa muy pro y muy blanco',
            'category_id' => '2'
        ]);

        Product::create([
            'name' => 'Sarten en aluminio',
            'image' => '20220228163745.jpeg',
            'price' => '800000',
            'stock' => '300',
            'description' => 'Soy un sarten muy pro y muy blanco',
            'category_id' => '3'
        ]);

        Product::create([
            'name' => 'Tennis adidas kiev',
            'image' => '20220319230734.jpg',
            'price' => '800000',
            'stock' => '300',
            'description' => 'Soy unos tennis muy pros y muy blanco',
            'category_id' => '4'
        ]);

        Product::create([
            'name' => 'Reloj intergalactico',
            'image' => '20220228163745.jpeg',
            'price' => '800000',
            'stock' => '300',
            'description' => 'Soy un reloj muy pro y muy blanco',
            'category_id' => '5'
        ]);

        Product::create([
            'name' => 'Play 4',
            'image' => '20220319230734.jpg',
            'price' => '800000',
            'stock' => '300',
            'description' => 'Soy un play 4 muy pro y muy blanco',
            'category_id' => '1'
        ]);

        Product::create([
            'name' => 'Manilla',
            'image' => '20220228163745.jpeg',
            'price' => '800000',
            'stock' => '300',
            'description' => 'Soy una manilla muy pro y muy blanco',
            'category_id' => '5'
        ]);

        Product::create([
            'name' => 'nokia 220',
            'image' => '20220319230734.jpg',
            'price' => '800000',
            'stock' => '300',
            'description' => 'Soy un nokia muy pro y muy blanco',
            'category_id' => '1'
        ]);
    }
}
