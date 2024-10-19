<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShelfRelation extends Model
{
    Use SoftDeletes;

    protected $guarded=[];

    use HasFactory;

    public function shelf(){
        return $this->belongsTo(Shelf::class,'shelf_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
