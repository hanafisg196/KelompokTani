<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ongkir;
use App\Models\Rekening;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class BayarPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $userId = auth()->user()->id;

        // Menyiapkan data yang akan disimpan
        $data = [
            'user_id' => $userId,
            'order_id' => $request->input('order_id'),
            'rekening_id'=> $request->input('rekening_id'),
            'bukti_transfer' => $request->input('bukti_transfer'),
        ];

        if ($request->file('bukti_transfer')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['bukti_transfer'] = $request->file('image')->store('image');
        }
        // Mencari atau membuat pembayaran berdasarkan kondisi tertentu
        $pembayaran = Pembayaran::updateOrCreate(
            [
                'user_id' => $userId,
                'order_id' => $request->input('order_id'),
            ],
            $data
        );
        $pembayaranId = $pembayaran->id;
        // $order = Order::find($request->input('order_id'));

        // if ($order) {
        //     $order->status = 'Menunggu konfirmasi';
        //     $order->save();
        // }

        return redirect("/lispembayaran")->with('success', 'Pembayaran berhasil diproses!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bayar = Pembayaran::find($id);
        $order = Order::find($id);
        $rekening = Rekening::all();
        // $order = Order::where('id',$id)->get();
        $pembayaran = new Pembayaran();
        $pembayaran->user_id = auth()->user()->id;
        $pembayaran->order_id = $order->id;
        return view('pelanggan.bayarpelanggan.upload')->with([
            'pembayaran' => $pembayaran,
            'rekening'=> $rekening,
            'bayar'=> $bayar,
            'order' => $order,
        ]);
    }

}
