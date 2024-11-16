<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderItemParameter extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function purchaseOrderItem()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'po_item_id', 'id');
    }

    public function grnItem()
    {
        return $this->hasMany(PurchaseOrderItemParameter::class, 'po_item_parameter_id', 'id');
    }

    public function sku()
    {
        return $this->belongsTo(ProductVariant::class, 'item_sku', 'id');

    }
}
