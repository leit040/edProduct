<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'system_name',
            'real_name',
            'types',
                    ];

public function url(){
    return asset('images/'.$this->type.'/'.$this->system_name);
}

}
