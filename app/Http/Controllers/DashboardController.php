<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',[
            'title'=>'dashboard',
            'totaluser' => User::count(),
            'total_orderan' => Order::wherein('status',['selesai','Pesanan Di Proses'])->count('status'),
            'totalpemasukan' => Pembayaran::wherein('status',['selesai','Pesanan Di Proses'])->sum('total')

        ]);
    }
}
