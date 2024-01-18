<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("voucher.index",[
            "voucher"=> Voucher::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "code_voucher"=> "required",
            "min"=> "required",
            "percent"=> "required",
            "start_date"=> "required",
            "end_date"=> "required",
            "ket"=> "required",
        ]);
        Voucher::create($validatedData);
        return redirect("/voucher")->with("success","Data Berhasil Ditambahkan!");
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

    }

    public function editdata(Request $request, $id_voucher)
    {
        if($request->isMethod("post")){
            $data = $request->all();
        }
        $voucher = Voucher::find($id_voucher);

        // Simpan data yang telah diedit
        $voucher->code_voucher = $request->code_voucher;
        $voucher->min = $request->min;
        $voucher->percent = $request->percent;
        $voucher->start_date = $request->start_date;
        $voucher->end_date = $request->end_date;
        $voucher->ket = $request->ket;
        $voucher->save();
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_voucher)
    {
         // Temukan data kegiatan berdasarkan ID
         $voucher = Voucher::find($id_voucher);

         // Jika data voucher ditemukan, lakukan penghapusan
         if ($voucher) {
             $voucher->delete();
             return redirect('/voucher')->with('success', 'Data berhasil dihapus.'); // Redirect dengan pesan sukses
         } else {
             return redirect('/voucher')->with('error', 'Data tidak ditemukan.'); // Redirect dengan pesan error jika data tidak ditemukan
         }
    }
}
