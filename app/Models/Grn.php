<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grn extends Model
{
    use softDeletes;

    protected $guarded = [];

    use HasFactory;

    public function grnItem(){
        return $this->hasMany(GrnItem::class, 'grn_id', 'id');
    }
}
