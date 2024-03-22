<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ketua;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $laporan = Pembayaran::with('orders.detail.products.categories')
                         ->orderBy('created_at')
                         ->get();

                        
                         $laporans = $laporan->groupBy(function ($laporan) {
                            return Carbon::parse($laporan->created_at)->format('F');
                        })->map(function ($laporans) {
                            $products = [];
                        
                            foreach ($laporans as $laporan) {
                                foreach ($laporan->orders->detail as $detail) {
                                    $productName = $detail->products->name;
                        
                                    if (!isset($products[$productName])) {
                                        $products[$productName] = [
                                            'qty' => 0,
                                        ];
                                    }
                        
                                    $products[$productName]['qty'] += $detail->qty;
                                }
                            }
                        
                            return [
                                'total' => $laporans->sum('total'),
                                'products' => $products,
                                'z' => Carbon::parse($laporans[0]->created_at)->format('F'),
                            ];
                        });
                        
                        $total = $laporan->sum('total');


        // return json_encode($laporans);

        $ketua = Ketua::all();

        
        return view('laporan.index')->with([
             'laporans' => $laporans,
             'ketua' => $ketua,
             'total' => $total
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function cetak()
    {

        $laporan = Pembayaran::with('orders.detail.products.categories')
                         ->orderBy('created_at')
                         ->get();

                        
                         $laporans = $laporan->groupBy(function ($laporan) {
                            return Carbon::parse($laporan->created_at)->format('F');
                        })->map(function ($laporans) {
                            $products = [];
                        
                            foreach ($laporans as $laporan) {
                                foreach ($laporan->orders->detail as $detail) {
                                    $productName = $detail->products->name;
                        
                                    if (!isset($products[$productName])) {
                                        $products[$productName] = [
                                            'qty' => 0,
                                        ];
                                    }
                        
                                    $products[$productName]['qty'] += $detail->qty;
                                }
                            }
                        
                            return [
                                'total' => $laporans->sum('total'),
                                'products' => $products,
                                'z' => Carbon::parse($laporans[0]->created_at)->format('F'),
                            ];
                        });

                        $ketua = Ketua::all();

        return view('laporan.cetak')->with([
             'laporans' => $laporans,
             'ketua' => $ketua
            ]);
    }


}
