<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseStockIn extends Model
{


    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function productVariant()
    {
        $this->hasOne(ProductVariant::class,'id','sku_id');
    }
    function purchaseOrder()
    {
        $this->hasOne(PurchaseOrder::class,'id','po_id');
    }

}
