<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShelfManage extends Model
{
    use SoftDeletes;

    protected $guarded =[];

    use HasFactory;

    public function warehouse(){
        return $this->belongsTo(CentralWarehouse::class,'warehouse_id','id');
    }
}
