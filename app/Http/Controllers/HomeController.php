<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pelanggan.home.index',[
            'datas' => Profil::all()
        ]);
    }




}
