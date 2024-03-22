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
<<<<<<< HEAD

    public function orders()
    {
        return $this->belongsTo(User::class, 'cart_id','id');
    }

    // public function vouchers()
    // {
    //     return $this->hasMany(Voucher::class, 'cart_id','id');
    // }

   



   
=======
>>>>>>> parent of 337e907 (kontol)
}
