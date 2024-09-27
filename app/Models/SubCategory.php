<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public $guarded = [];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'CatId', 'id');
    }

    function product()
    {
        return $this->belongsTo(Product::class,'sub_cat_id', 'id');
    }

}
