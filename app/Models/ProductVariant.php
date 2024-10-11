<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{

    use SoftDeletes;

    public $guarded = [];

    use HasFactory;

    function barcodeItem()
    {
        return $this->belongsTo(BarcodeItem::class, 'id','sku_id');
    }

    function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function warehouseInventory()
    {
        return $this->belongsTo(WarehouseInventory::class,'id','sku_id');
    }
}
