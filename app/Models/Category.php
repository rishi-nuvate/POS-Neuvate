<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $guarded = [];

    use HasFactory;

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'CatId', 'id');
    }

    function product()
    {
        return $this->belongsTo(Product::class, 'cat_id', 'id');
    }

    public function fit()
    {
        return $this->belongsTo(Fit::class, 'cat_id', 'id');
    }

    public function slim()
    {
        return $this->belongsTo(Slim::class, 'cat_id', 'id');
    }

}
