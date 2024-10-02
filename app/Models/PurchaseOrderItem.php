<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderItem extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function purchaseOrderItemParameter()
    {
        return $this->hasMany(PurchaseOrderItemParameter::class);
    }

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
