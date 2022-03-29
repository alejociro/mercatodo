<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->randomDigitNotZero(),
            'stock' => $this->faker->randomDigitNotZero(),
            'description' => $this->faker->words(5, true),
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(50),
        ];
    }
}
