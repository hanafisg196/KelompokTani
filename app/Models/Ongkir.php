<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ongkir';
    protected $guarded = ['id_ongkir'];
    

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_prov','id_prov');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'id_city','id_city');
    }
}
