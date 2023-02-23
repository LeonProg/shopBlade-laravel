<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'price',
        'quantity',
        'category_id'
    ];

//    public function images()
//    {
//        return $this->hasMany(ProductImage::class, 'product_id', 'id');
//    }
//
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id', 'id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
