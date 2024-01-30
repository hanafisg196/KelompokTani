<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    // public function carts()
    // {
    //     return $this->belongsTo(Cart::class, 'cart_id','id');
    // } 

}
