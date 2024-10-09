<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseInventory extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function warehouse()
    {
        return $this->belongsTo(CentralWarehouse::class,'warehouse_id','id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function productVariant()
    {
        return $this->hasOne(ProductVariant::class,'id','sku_id');
    }

    use HasFactory;
}
