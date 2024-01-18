<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("rekening.index",[
            "rekening" => Rekening::all()
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
            "name"=> "required",
            "bank_name"=> "required",
            "rek"=> "required"
        ]);
        Rekening::create($validatedData);
        return redirect("/rekening")->with("success","Data Berhasil Ditambahkan!");
    }

    public function editrekening(Request $request, $id_rekening)
    {
        if($request->isMethod("post")){
            $data = $request->all();
        }
        $rekening = Rekening::find($id_rekening);

        // Simpan data yang telah diedit
        $rekening->name = $request->name;
        $rekening->bank_name = $request->bank_name;
        $rekening->rek = $request->rek;
        $rekening->save();
        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rekening)
    {
         // Temukan data kegiatan berdasarkan ID
         $rekening = Rekening::find($id_rekening);

         // Jika data rekening ditemukan, lakukan penghapusan
         if ($rekening) {
             $rekening->delete();
             return redirect('/rekening')->with('success', 'Data berhasil dihapus.'); // Redirect dengan pesan sukses
         } else {
             return redirect('/rekening')->with('error', 'Data tidak ditemukan.'); // Redirect dengan pesan error jika data tidak ditemukan
         }
    }
}
