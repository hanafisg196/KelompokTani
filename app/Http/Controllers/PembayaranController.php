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
    public function index(Pembayaran $pembayaran, Request $request)
    {
        $pembayarans = $pembayaran->when($request->has('search'), function ($query) use ($request) {
            $query->where('invoice', 'LIKE', '%' . $request->search . '%')
            ->orwhere('status', 'LIKE', '%' . $request->search . '%');
        })->latest()->paginate(10);
        return view("pembayaran.index",compact('pembayarans'));
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
        return view('pembayaran.konfirmasi')->with([
            'bayar' => $bayar,

        ]);
    }

    public function cetakFaktur($id)
    {
        $bayar = Pembayaran::find($id);
        $orders = Order::find($bayar->order_id); // Mencari Order berdasarkan $id
        $details = OrderDetail::whereIn('order_id', $orders->pluck('id'))->get();

        return view('pembayaran.faktur')->with([
            'bayar' => $bayar,
            'orders' => $orders,
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
        // Temukan data kegiatan berdasarkan ID
        $pembayaran = Pembayaran::find($id);

        // Jika data pembayaran ditemukan, lakukan penghapusan
        if ($pembayaran) {
            $pembayaran->delete();
            return redirect('/pembayaran')->with('success', 'Data berhasil dihapus.'); // Redirect dengan pesan sukses
        } else {
            return redirect('/pembayaran')->with('error', 'Data tidak ditemukan.'); // Redirect dengan pesan error jika data tidak ditemukan
        }
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

            $bayar->status = 'Pesanan Di Proses';
            $bayar->save();

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
