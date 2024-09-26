<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        'b_address1' ,
        'b_address2',
        'b_city',
        'b_state',
        'b_pincode',
    ];

    use HasFactory;

    public function UserAddress(){
        return $this->belongsTo(UserAddress::class);
    }
}
