<?php

namespace App\Helpers\Products;

class StoreFormatImage
{
    public function saveImage($image): array
    {
        $routeSaveImg = 'image/';
        $imageProduct = date('YmdHis'). "." . $image->getClientOriginalExtension();
        $image->move($routeSaveImg, $imageProduct);
        $data['image'] = "$imageProduct";

        return $data;
    }
}
