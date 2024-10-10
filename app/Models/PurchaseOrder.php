<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    Use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function purchaseOrderItem(){
        return $this->hasMany(PurchaseOrderItem::class,'po_id','id');
    }

    public function purchaseOrderItemParameter(){
        return $this->hasMany(PurchaseOrderItemParameter::class,'po_id','id');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public  function shipAddress(){
        return $this->belongsTo(CompanyShipAddress::class,'company_shipping_id','id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
