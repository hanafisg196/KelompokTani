<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_city';
    protected $guarded = ['id_city'];
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_prov','id_prov');
    }

    public function ongkir()
    {
        return $this->hasOne(Ongkir::class, 'id_city', 'id_city');
    }
}
