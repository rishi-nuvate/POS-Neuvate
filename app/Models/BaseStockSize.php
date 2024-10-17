<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseStockSize extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function baseStock(){
       return $this->belongsTo(BaseStockCategory::class, 'base_stock_cat_id','id');
    }

}
