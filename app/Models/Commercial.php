<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commercial extends Model
{
    protected $table = 'commercial';

    protected $guarded = [];

    use HasFactory;

    use softDeletes;
}
