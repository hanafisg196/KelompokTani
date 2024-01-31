<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
                            return Carbon::parse($laporan->created_at)->format('m');
                        })->map(function ($laporans) {
                            $products = [];
                            $detailsQty = [];
                    
                            foreach ($laporans as $laporan) {
                                $productName = $laporan->orders->detail->first()->products->name;
                    
                            
                                if (isset($products[$productName])) {
                                    $detailsQty[$productName] += $laporan->orders->detail->first()->qty;
                                } else {
                                    
                                    $products[$productName] = $productName;
                                    $detailsQty[$productName] = $laporan->orders->detail->first()->qty;
                                }
                            }
                    
                            return [
                                'total' => $laporans->sum('total'),
                                'products' => array_values($products),
                                'details' => array_values($detailsQty),
                                'z' => Carbon::parse($laporans[0]->created_at)->format('F'),
                            ];
                        });
                    
                        return json_encode($laporans);



        
        // return view('laporan.index')->with('laporans', $laporans);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function cetak()
    {
        return view('laporan.cetak');
    }


}
