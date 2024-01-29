<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Ongkir;
use App\Models\Rekening;
use App\Models\Pembayaran;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ongkir = Ongkir::first();
        $rekening = Rekening::first();
        $order = Order::first();
        $user = User::first();

        // Membuat objek pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->user_id = $user->id;
        $pembayaran->order_id = $order->id;
        $pembayaran->ongkir_id = $ongkir->id_ongkir;
        $pembayaran->rekening_id = $rekening->id_rekening;





        return view("pembayaran.index",[
            'pembayarans' => Pembayaran::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pembayaran.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = User::first();
        $ongkir = Ongkir::first();
        $rekening = Rekening::first();
        $order = Order::first();
        $details = OrderDetail::whereIn('order_id', $order->pluck('id'))->get();

        $pembayaran = new Pembayaran();
        $pembayaran->user_id = $user->id;
        $pembayaran->order_id = $order->id;
        $pembayaran->ongkir_id = $ongkir->id_ongkir;
        $pembayaran->rekening_id = $rekening->id_rekening;




        return view('pembayaran.konfirmasi')->with([
            'pembayaran' => $pembayaran,
            'bayar' => $bayar,
            'details' => $details,

        ]);
    }
     // return json_encode($details);
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function accept($id)
    {

        $bayar = Pembayaran::find($id);

        $order = Order::find($bayar->order_id);
        $details = OrderDetail::where('order_id', $order->id)->get();

        foreach ($details as $detail)
        {
            $product = $detail->products;

            if ($product)
            {
                $product->stok -= $detail->qty;
                $product->save();
            }
            else{
                return response()->json(['error' => 'Produk Tidak Ditemukan'], 404);
            }
        }

            $order->status = 'Pesanan Di Proses';
            $order->save();

            return redirect('/pembayaran');

    }

    public function deny($id)
    {
        $bayar = Pembayaran::find($id);

        $order = Order::find($bayar->order_id);

             $order->status = 'Pembayaran Ditolak';
             $order->save();

            return redirect('/pembayaran')->with('success', 'sangatlah deniell');
    }



}
