<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function detail()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function ongkirs()
    {
        return $this->belongsTo(Ongkir::class, 'ongkir_id','id_ongkir');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'order_id','id');
    }
}
