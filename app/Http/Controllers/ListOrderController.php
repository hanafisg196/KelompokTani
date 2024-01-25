<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ongkir;
use App\Models\Rekening;
use App\Models\Pembayaran;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;

        // Mengambil daftar pesanan berdasarkan user yang sedang login
        $orders = Order::where('user_id', $userId)->get();

        // Mengambil detail pesanan terkait
        $details = OrderDetail::whereIn('order_id', $orders->pluck('id')->toArray())->get();

        return view("pelanggan.cart.listorder", [
            'orders' => $orders,
            'details' => $details
        ]);

    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;

        // Menyiapkan data yang akan disimpan
        $data = [
            'user_id' => $userId,
            'order_id' => $request->input('order_id'),
            'alamat' => $request->input('alamat'),
            'ongkir_id' => $request->input('ongkir_id'),
            'rekening_id'=> $request->input('rekening_id'),
        ];

        // Mencari atau membuat pembayaran berdasarkan kondisi tertentu
        $pembayaran = Pembayaran::updateOrCreate(
            [
                'user_id' => $userId,
                'order_id' => $request->input('order_id'),
            ],
            $data
        );
        $pembayaranId = $pembayaran->id;

        // Mengarahkan pengguna ke tampilan edit dengan menggunakan ID pembayaran
        return redirect("/bayarpelanggan/{$pembayaranId}/edit")->with('success', 'Pembayaran berhasil diproses!');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $ongkir = Ongkir::first();
        $rekening = Rekening::first();
        $pembayaran = new Pembayaran();
        $pembayaran->user_id = auth()->user()->id;
        $pembayaran->order_id = $order->id;
        $pembayaran->ongkir_id = $ongkir->id_ongkir;
        $pembayaran->rekenig_id = $rekening->id_rekening;
        return view('pelanggan.bayarpelanggan.index')->with([
            'pembayaran' => $pembayaran,
        ]);
    }


}
