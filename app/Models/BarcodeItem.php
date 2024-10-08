<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarcodeItem extends Model
{
    use SoftDeletes;
    protected $guarded= [];

    use HasFactory;

    public function barcode()
    {
        return $this->belongsTo(Barcode::class, 'barcode_id','id');
    }

    public function productVariant()
    {
        return $this->hasOne(ProductVariant::class, 'id','sku_id');
    }
}
