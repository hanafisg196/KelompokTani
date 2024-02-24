<?php

namespace App\Http\Controllers;

use App\Models\Ketua;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LaporanHariBulanController extends Controller
{

   
   public function day()
   {
       return view('laporan.laporanbyday');
   }

   public function mon()
   {
       return view('laporan.laporanbymon');
   }


   public function getDataByDay(Request $request)
   {
         $date = $request->input('date');
         $day = Carbon::parse($date)->locale('id')->isoFormat('dddd, D MMMM YYYY');
     
         $data = Pembayaran::with('users', 'orders.detail.products')
                             ->where('status', '=', 'selesai')
                             ->whereDate('created_at','=', $date)
                             ->get();
                     $bos = Ketua::all();
                     $total = $data->sum('total');
         return view('laporan.laporanharian')->with([
                                    'data'=> $data,
                                    'bos'=>$bos,
                                    'total'=>$total,
                                    'day'=> $day
                                ]);
     
   }



   public function getDataByDate(Request $request)
   {
        
         $start_date = $request->input('start_date');
         $end_date = $request->input('end_date');
       
         $start_date_month = Carbon::parse($start_date)->format('F');
        //  $end_date_month = Carbon::parse($end_date)->format('F');

        //  if($start_date_month == $end_date_month)
        //  {
        //     $end_date_month = '-';
        //  } else {
        //     $end_date_month = Carbon::parse($end_date)->format('F');
            
        //  }
        
          $data = Pembayaran::with('users', 'orders.detail.products')
                            ->where('status', '=', 'selesai')
                            ->whereDate('created_at','>=', $start_date)
                            ->whereDate('created_at','<=', $end_date)
                            ->get();
         $bos = Ketua::all();
         
        $total = $data->sum('total');
      
        return view('laporan.laporanbulanan')
            ->with([
            'data' => $data,
            'bos' => $bos,
            'total' => $total,
            'start_date_month' => $start_date_month
            ]);
     
   }

   public function cetakBulanan(Request $request)
   {
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
  
    $start_date_month = Carbon::parse($start_date)->format('F');
   //  $end_date_month = Carbon::parse($end_date)->format('F');

   //  if($start_date_month == $end_date_month)
   //  {
   //     $end_date_month = '-';
   //  } else {
   //     $end_date_month = Carbon::parse($end_date)->format('F');
       
   //  }
   
     $data = Pembayaran::with('users', 'orders.detail.products')
                       ->where('status', '=', 'selesai')
                       ->whereDate('created_at','>=', $start_date)
                       ->whereDate('created_at','<=', $end_date)
                       ->get();
    $bos = Ketua::all();
    
   $total = $data->sum('total');
 
   return view('laporan.cetakbulanan')
       ->with([
       'data' => $data,
       'bos' => $bos,
       'total' => $total,
       'start_date_month' => $start_date_month
       ]);
   }
}
