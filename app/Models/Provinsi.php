<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_prov';
    protected $guarded = ['id_prov'];

    public function kota()
    {
        return $this->hasMany(Kota::class);
    }
}
