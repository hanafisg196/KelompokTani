<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function orders()
    {
        return $this->belongsTo(User::class, 'cart_id','id');
    }

   
}