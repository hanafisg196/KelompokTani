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

   public function addToCart(Request $request, $id)
    {
        if (auth()->user()) {
            $duplicate = Cart::where('product_id', $id)
                ->where('user_id', auth()->user()->id)
                ->first();

            if ($duplicate) {
                return redirect('/cartproduk')->with('error', 'Produk sudah ada di dalam keranjang.');
            }


            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => 1,
            ];

            Cart::create($data);

            return redirect('/cartproduk')->with('success', 'Produk berhasil ditambahkan!');
        } else {
            return redirect('/login');
        }
    }


}
