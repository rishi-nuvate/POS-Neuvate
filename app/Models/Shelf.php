<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shelf extends Model
{
    use SoftDeletes;

    protected $guarded =[];

    use HasFactory;

    public function warehouse(){
        return $this->belongsTo(CentralWarehouse::class,'warehouse_id','id');
    }

    public function shelfProduct(){
        return $this->hasMany(ShelfRelation::class,'shelf_id','id');
    }

}
