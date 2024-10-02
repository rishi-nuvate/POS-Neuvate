<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderItemParameter extends Model
{

    Use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function purchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function purchaseOrderItem(){
        return $this->hasMany(PurchaseOrderItem::class);
    }
}
