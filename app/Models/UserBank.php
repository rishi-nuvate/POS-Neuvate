<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{

    protected $fillable = [
        'user_id',
        'account_no',
        'bank_name',
        'account_name',
        'ifsc',
    ];
    use HasFactory;

    public function UserBank()
    {
        return $this->belongsTo(UserBank::class);
    }
}
