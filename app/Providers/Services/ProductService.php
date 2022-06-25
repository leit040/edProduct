<?php

namespace App\Providers\Services;

use App\Models\Product;


class ProductService implements ProductInterface
{
    public $fileService;
    public function __construct(FileInterface $fileService){
        $this->fileService = $fileService;
    }

    public function create(array $productData): ?Product
    {
     $files = $this->fileService->create($productData['files']);
     $data = array_merge($productData,$files);
     if($product = Product::create($data)){
         return $product;
     }
     return false;
    }
}
