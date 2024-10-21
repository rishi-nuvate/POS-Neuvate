<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    use HasFactory;

    public function productvarient()
    {
        return $this->hasMany(ProductVariant::class, 'color', 'id');
    }

}
