<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{



    public function index(Order $order )

    {

        $data = $order::where(['user_id' => auth()->user()->id])->get();

        // return json_encode($data);
    
        return view('pelanggan.cart.checkout',[
            "active" => "produk",
        ])->with('data', $data);
    }

    




   



   
}
