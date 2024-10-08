<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseInventory extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function warehouse()
    {
        return $this->belongsTo(CentralWarehouse::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function productVariant()
    {
        $this->hasOne(ProductVariant::class);
    }

    use HasFactory;
}
