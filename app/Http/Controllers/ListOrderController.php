<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $rekening = Rekening::all();
        $orders = Order::where('user_id', $userId)->latest()->get();
        $details = OrderDetail::whereIn('order_id', $orders->pluck('id'))->get();

        return view("pelanggan.cart.listorder", [
            'orders' => $orders,
            'details' => $details,
            'rekening'=> $rekening,
        ]);

    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;

        // Menyiapkan data yang akan disimpan
        $data = [
            'user_id' => $userId,
            'order_id' => $request->input('order_id'),
            'total' => $request->input('total'),
            'alamat' => $request->input('alamat'),
            'rekening_id'=> $request->input('rekening_id'),
            'bukti_transfer' => $request->input('bukti_transfer'),
        ];

        // Mencari atau membuat pembayaran berdasarkan kondisi tertentu
        Pembayaran::updateOrCreate(
            [
                'user_id' => $userId,
                'order_id' => $request->input('order_id'),
            ],
            $data
        );

        Cart::where(['user_id' => auth()->user()->id])->delete();

        $order = Order::find($request->input('order_id'));

        if ($order) {
            $order->status = 'Menunggu konfirmasi';
            $order->save();
        }

        return redirect("/listorder")->with('success', 'Pembayaran sukses!');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $ongkir = Ongkir::first();
        $rekening = Rekening::all();
        $pembayaran = new Pembayaran();
        $pembayaran->user_id = auth()->user()->id;
        $pembayaran->order_id = $order->id;
        $pembayaran->ongkir_id = $ongkir->id_ongkir;
        return view('pelanggan.bayarpelanggan.index')->with([
            'pembayaran' => $pembayaran,
            'rekening' => $rekening
        ]);
    }

        public function destroy($order_id)
    {
        DB::table('order_details')->where('order_id',$order_id)->delete();
        DB::table('orders')->where('id',$order_id)->delete();
        return redirect('/listorder')->with('success', 'Data berhasil dihapus.');
    }
}
