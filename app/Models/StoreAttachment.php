<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreAttachment extends Model
{
    use softDeletes;

    protected $table = 'store_attachment';

    protected $guarded = [];

    use HasFactory;

}
