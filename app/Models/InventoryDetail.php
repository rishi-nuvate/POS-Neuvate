<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryDetail extends Model
{
    use softDeletes;

    protected $table = 'inventory_detail';

    protected $guarded = [];

    use HasFactory;
}
