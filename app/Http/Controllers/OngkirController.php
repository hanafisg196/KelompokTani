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
    public function destroy($id)
    {
        //
    }
}
