<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    public $guarded = [];

    use HasFactory;

    public function ShipAdd(){
        return $this->hasMany(CompanyShipAddress::class);
    }

    public function warehouse(){
        return $this->belongsTo(CentralWarehouse::class,'id','company_id');
    }
}
