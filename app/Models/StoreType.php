<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreType extends Model
{

    use softDeletes;

    protected $guarded = [];

    use HasFactory;

    public function storeGenerate()
    {
        return $this->belongsTo(StoreGenerate::class, 'id', 'store_type_id');
    }
}
