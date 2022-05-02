<?php

namespace App\Actions\Admin;

use App\Models\Product;

class StoreOrUpdateImage
{
    public function updateImage($image, Product $prod): Product
    {
        if ($imagen = $image) {
            $rutaGuardarImg = 'image/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['image'] = "$imagenProducto";
        } else {
            unset($prod['image']);
        }

        return $prod;
    }
}
