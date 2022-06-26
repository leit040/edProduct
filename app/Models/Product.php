<?php

namespace App\Models;

use App\Http\Filters\ProductFilter;
use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

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



    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        $filter->apply($builder);
    }
    public function image(){
        return $this->hasOne(File::class,'id','image_id');
    }

    public function file(){
        return $this->hasOne(File::class,'id','file_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function priceInUAH(){
        $actualRate = DB::table('exchange_rates')->select('rate')->where('cc','USD')->sum('rate');

        return $this->price * $actualRate.'UAH';
    }

    public function priceInAnotherCurrency(string $cc){
    $usdRate = DB::table('exchange_rates')->select('rate')->where('cc','USD')->sum('rate');
    $currencyRate = DB::table('exchange_rates')->select('rate')->where('cc',$cc)->sum('rate');
    return (float)$this->price * $usdRate / $currencyRate.$cc;
    }
}
