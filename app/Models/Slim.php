<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slim extends Model
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
}
