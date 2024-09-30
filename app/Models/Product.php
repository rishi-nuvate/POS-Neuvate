<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $guarded = [];

    use HasFactory;

    function category()
    {
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

    function subCategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'sub_cat_id');
    }

    function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    function season()
    {
        return $this->hasOne(Season::class, 'id', 'season_id');
    }

    function productVariant()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

}
