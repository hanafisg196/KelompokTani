<?php

namespace App\Http\Controllers;

use App\Models\Ongkir;
use App\Models\Order;
use App\Models\Pembayaran;
use App\Models\Rekening;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{



    public function index( )

    {


          $order = Order::where(['user_id' => auth()->user()->id])->first();
          $ongkir = Ongkir::first();
          $rekening = Rekening::first();
          $pembayaran = new Pembayaran();
          $pembayaran->user_id = auth()->user()->id;
          $pembayaran->order_id = $order->id;
          $pembayaran->ongkir_id = $ongkir->id_ongkir;
          $pembayaran->rekenig_id = $rekening->id_rekening;
        
        // return json_encode($pembayaran);
    
        return view('pelanggan.cart.checkout',[
            "active" => "produk",
            "rekening" => Rekening::all(),

        ])->with('pembayaran', $pembayaran);
    }

    




   



   
}
