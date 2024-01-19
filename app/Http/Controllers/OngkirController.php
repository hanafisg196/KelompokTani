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
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        $kota = Kota::latest()->get();
        return view('ongkir.index', compact('provinsi','kota'));
    }


    public function kategori(Provinsi $provinsi)
        {
            return view('ongkir.kategori', [
                'kota' => Kota::where('id_prov', $provinsi->id_prov)->latest()->get(),
                'provinsi' => Provinsi::all(),
            ]);
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
        return view('ongkir.create', compact('provinsi','kota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        // $validatedData = $request->validate([
        //     'id_city' => 'required',
        //     'id_prov' => 'required',
        //     'ongkir' => 'required',
        // ]);
        // Ongkir::create($validatedData);
        // return redirect("/ongkir")->with("success","Data Berhasil Ditambahkan!");
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
