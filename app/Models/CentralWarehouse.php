<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CentralWarehouse extends Model
{
    use SoftDeletes;

    public $guarded = [];

    use HasFactory;

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }

    public function warehouseInventory()
    {
        return $this->hasMany(WarehouseInventory::class,'warehouse_id','id');
    }

    public function shelf(){
        return $this->hasMany(ShelfManage::class,'warehouse_id','id');
    }

}
