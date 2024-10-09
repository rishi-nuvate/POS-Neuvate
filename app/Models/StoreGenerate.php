<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreGenerate extends Model
{
    use softDeletes;

    protected $guarded = [];

    use HasFactory;

    public function storeType()
    {
        return $this->hasOne(StoreType::class, 'id', 'store_type_id');
    }
}
