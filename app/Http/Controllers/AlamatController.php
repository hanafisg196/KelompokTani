<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AlamatController extends Controller
{

    // public function store(Request $request)
    // {
    //     {
    //         $userId = auth()->user()->id;

    //         $data = [
    //             'user_id' => $userId,
    //             'ongkir_id' => $request->input('ongkir_id'),
    //         ];

    //         Order::updateOrCreate(
    //             [
    //                 'user_id' => $userId
    //             ],
    //             $data
    //         );
    //         return redirect("/listorder")->with('success', 'Alamat berhasil tambahkan!');
    //     }
    // }

    public function editalamat(Request $request, $id)
    {
        if($request->isMethod("post")){
            $data = $request->all();
        }
        $order = Order::find($id);

        // Simpan data yang telah diedit
        $order->ongkir_id = $request->ongkir_id;
        $order->alamat = $request->alamat;
        $order->save();
        return redirect()->back();
    }

}
