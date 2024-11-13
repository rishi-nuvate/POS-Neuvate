<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PickerAllocation extends Model
{
    use softDeletes;

    protected $guarded = [];

    use HasFactory;

    function pickerProduct()
    {
        return $this->hasMany(PickerAllocationProduct::class,'picker_allocation_id','id');
    }

    function stockAllocation()
    {
        return $this->belongsTo(StockAllocation::class,'order_id','id');
    }

    function store()
    {
        return $this->belongsTo(StoreGenerate::class,'store_id','id');
    }

    function employee()
    {
        return $this->belongsTo(Employee::class,'emp_id','id');
    }


}
