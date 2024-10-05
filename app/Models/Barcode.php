<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barcode extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function barcodeItem()
    {
        return $this->hasMany(BarcodeItem::class, 'barcode_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
