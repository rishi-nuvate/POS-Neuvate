<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrnItem extends Model
{
    use softDeletes;

    protected $guarded = [];

    use HasFactory;

    public function grn()
    {
        return $this->belongsTo(Grn::class, 'grn_id', 'id');
    }

    public function sku()
    {
        return $this->belongsTo(ProductVariant::class, 'sku_id', 'id');
    }

    public function poParameterId()
    {
        return $this->belongsTo(PurchaseOrderItemParameter::class, 'po_item_parameter_id', 'id');
    }
}
