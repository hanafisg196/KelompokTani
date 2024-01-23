<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Bus;

class Product extends Model
{
   
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "harga",
        "stok",
        "deskripsi",
        "image",
        "category_id",
    ];

    public function categories():BelongsTo
    {
        return $this->belongsTo(Category::class,"category_id", "id");
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, "id_product", "id");
    }
}
