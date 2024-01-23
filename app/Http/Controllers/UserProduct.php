<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

   public function addToCart($id)
   {
      if(auth()->user())
      {
        $data = [
          'user_id' =>auth()->user()->id,
          'product_id' => $id,
          'quantity' => 1
          
        ];
        Cart::updateOrCreate($data)->with('data',$data);;
        return redirect('/produkpelanggan')->with('success','Data berhasil ditambahkan!');
      }
      
      else{

         return redirect('/login');
      }
   }


  
}
