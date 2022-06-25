<?php

namespace App\Providers\Services;

use App\Models\File;
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

    public function update(array $productData,Product $product): ?Product
    {
        $files = $this->fileService->create($productData['files']);
        if($files){
            foreach ($files as $key=>$file){

                $oldFile = File::find($product->$key);
                $oldFile->delete();
                $product->$key = $file;
            }
        }
        $product->update($productData);
        return $product;

    }
}
