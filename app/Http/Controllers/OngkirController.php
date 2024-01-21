<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Ongkir;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
     
    public function index(Ongkir $Ongkir)
    {
        $data = $Ongkir->paginate(10);
        return view ("Ongkir.index")->with('data', $data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::latest()->get();
        $kota = Kota::latest()->get();
        return response()->view('ongkir.create', compact('provinsi','kota'));
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
            'id_city' => 'required',
            'id_prov' => 'required',
            'ongkir' => 'required',
        ]);
        $validatedData['id_city'] = $request->input('id_city');
        $validatedData['id_prov'] = $request->input('id_prov');
        Ongkir::create($validatedData);
        return redirect("/ongkir")->with("success","Data Berhasil Ditambahkan!");
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
        $data = Ongkir::find($id);
        return view('ongkir.edit')->with('data', $data);
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
        $validatedData = $request->validate([
            'ongkir' => 'required',
        ]);
        
        $data = Ongkir::find($id);

        $data->update($validatedData);
        
        return redirect('/ongkir')->with('success', 'Data berhasil diupdate!');
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ongkir = Ongkir::find($id);
        $ongkir->delete();
        
        return redirect('/ongkir')->with('success', 'Data berhasil Di hapus!');
    }
}
