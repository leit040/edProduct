<?php
namespace App\Providers\Services;

use phpDocumentor\Reflection\File;

interface FileInterface
{
public function create(array $files):?array;

}
