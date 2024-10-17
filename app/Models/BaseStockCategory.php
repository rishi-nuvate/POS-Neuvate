<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseStockCategory extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function store(){
        return $this->belongsTo(StoreGenerate::class,'store_id', 'id');
    }

    public function category(){
        return $this->hasOne(Category::class, 'id','cat_id');
    }

    public function size(){
       return $this->hasMany(BaseStockSize::class, 'base_stock_cat_id','id');
    }

}
