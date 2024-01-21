<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserProduct extends Controller
{
   public function index(Product $product)
   {
        $data =  $product->paginate(10);
        return   view('pelanggan.produk.index',["active" => "produk" ])
                ->with('data',$data);
   }


   public function detailProduct(Product $product, $id)
   {
    $data = $product->find($id);
     return view('pelanggan.produk.detail')->with('data',$data);
   }


  
}
