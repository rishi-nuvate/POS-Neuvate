<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PickerAllocationProduct extends Model
{
    use softDeletes;

    protected $guarded = [];

    use HasFactory;

    function pickerProduct()
    {
        return $this->belongsTo(PickerAllocation::class, 'picker_allocation_id', 'id');
    }

    function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
