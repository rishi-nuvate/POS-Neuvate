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
}
