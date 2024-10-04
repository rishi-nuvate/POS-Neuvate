<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyShipAddress extends Model
{
    public $guarded = [];

    use HasFactory;

    public function Company(){
        return $this->belongsTo(Company::class);
    }

    public function purchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class,'company_shipping_id','id');
    }
}
