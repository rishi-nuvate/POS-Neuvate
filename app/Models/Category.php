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
        return $this->hasMany(SubCategory::class,'CatId','id');
    }

}
