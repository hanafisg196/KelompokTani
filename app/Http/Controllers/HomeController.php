<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController extends Controller
{
    public function index(Product $product)
    {
      $data =  $product->paginate(4);
        return   view('pelanggan.home.index')
                ->with('data',$data);
    
    }


    public function about()
    {
        $data  = Profil::all();

        return view('pelanggan.home.about')->with('data' ,$data);
    }




}
