<?php


namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{

    public function title(string $title){
        $this->builder->where('title','like','%' .$title.'%');
    }

    public function category_id(string $category_id){
        $this->builder->where('category_id',$category_id);
    }

    public function type_id(string $type_id){
        $this->builder->where('category_id',$type_id);
    }
}
