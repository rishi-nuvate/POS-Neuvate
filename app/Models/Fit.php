<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fit extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function subCategory()
    {
        return $this->hasOne(SubCategory::class,'id','sub_cat_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

    function fit()
    {
        return $this->belongsTo(Product::class, 'id', 'fit_id');
    }
}
