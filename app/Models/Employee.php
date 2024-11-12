<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $guarded = [];

    use HasFactory;

    public function stock(){
        return $this->belongsTo(StockAllocation::class,'id','picker_id');
    }
}
