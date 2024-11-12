<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockAllocationProduct extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function stockAllocation(){
        return $this->belongsTo(StockAllocation::class, 'stock_allocation_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
    public function sku(){
        return $this->belongsTo(ProductVariant::class, 'sku_id','id');
    }

}
