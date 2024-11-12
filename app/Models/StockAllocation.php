<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockAllocation extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function warehouse(){
        return $this->hasOne(CentralWarehouse::class,'id','warehouse_id');
    }

    public function store(){
        return $this->hasOne(StoreGenerate::class,'id','store_id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function stockProduct(){
        return $this->hasMany(StockAllocationProduct::class,'stock_allocation_id','id');
    }

    public function picker(){
        return $this->hasOne(Employee::class,'id','picker_id');
    }
}
