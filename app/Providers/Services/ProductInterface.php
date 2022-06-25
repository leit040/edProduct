<?php

namespace App\Providers\Services;

use App\Models\Product;

interface ProductInterface
{
    public function create(array $productData):?Product;
    public function update(array $productData,Product $product):?Product;

}
