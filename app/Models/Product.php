<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'title',
            'description',
            'type_id',
            'category_id',
            'file_id',
            'price',
            'image_id'

        ];

    public function image(){
        return $this->hasOne(File::class,'id','image_id');
    }

    public function file(){
        return File::where('id',$this->file_id);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
