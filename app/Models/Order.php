<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    // public function carts()
    // {
    //     return $this->hasMany(Cart::class,'cart_id','id');
    // }

    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'user_id','id');
    // }
    public function detail()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
