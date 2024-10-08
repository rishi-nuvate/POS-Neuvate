<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{

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
}
