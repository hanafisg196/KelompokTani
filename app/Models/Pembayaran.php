<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function oders()
    {
        return $this->belongsTo(Order::class, 'order_id','id');
    }

    public function ongkirs()
    {
        return $this->belongsTo(Ongkir::class, 'ongkir_id','id_ongkir');
    }

    public function rekenigs()
    {
        return $this->belongsTo(Rekening::class, 'rekening_id','id_rekening');
    }
}
