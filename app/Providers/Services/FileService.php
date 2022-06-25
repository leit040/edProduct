<?php

namespace App\Providers\Services;

use App\Models\File;
use Illuminate\Support\Str;

class FileService implements FileInterface
{

    public function create(array $files): ?array
    {
        $return = [];
        foreach ($files as $key => $file) {
            $data = [
                'system_name' => Str::random(25) . '.' . $file->getClientOriginalExtension(),
                'real_name' => $file->getClientOriginalName(),
                'types' => $key,
            ];
            $file->storeAs('images/' .$key.'/',$data['system_name']);
            $file = File::create($data);
            $return[$data['types']]=$file->id;
        }
    return $return;
    }
}
