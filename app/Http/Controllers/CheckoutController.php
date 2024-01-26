<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Ongkir;
use App\Models\Rekening;
use App\Models\Pembayaran;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{



    public function index()

    {
        $userId = auth()->user()->id;

        // Mengambil data order berdasarkan ID user dan status belum dibayar
        $order = Order::where('user_id', $userId)
                      ->where('status', 'unpaid')
                      ->first();

        // Memastikan bahwa ada pesanan yang belum dibayar
        if (!$order) {
            return redirect()->route('home')->with('error', 'Tidak ada pesanan yang belum dibayar.');
        }

        // Mendapatkan ongkir dan rekening pertama (sesuaikan dengan kebutuhan Anda)
        $ongkir = Ongkir::first();
        $rekening = Rekening::first();

        // Membuat objek pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->user_id = auth()->user()->id;
        $pembayaran->order_id = $order->id;
        $pembayaran->ongkir_id = $ongkir->id_ongkir;
        $pembayaran->rekening_id = $rekening->id_rekening;

        // Melakukan operasi atau menampilkan informasi sesuai kebutuhan
        // ...

        // Mengembalikan tampilan checkout dengan data yang diperlukan
        return view('pelanggan.cart.checkout', [
            'active' => 'produk',
            'rekening' => Rekening::all(),
            'pembayaran' => $pembayaran,
        ]);
    }

    public function bayar()

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

        return view('pelanggan.cart.checkoutbayar',[
            "active" => "produk",
            "rekening" => Rekening::all(),

        ])->with([
                    'pembayaran' => $pembayaran,
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
            'rekening_id'=> $request->input('rekening_id')
        ];

        // Mencari atau membuat pembayaran berdasarkan kondisi tertentu
        Pembayaran::updateOrCreate(
            [
                'user_id' => $userId,
                'order_id' => $request->input('order_id'),
            ],
            $data
        );

        return redirect('/checkout/bayar')->with('success', 'Pembayaran berhasil diproses!');
    }

}

