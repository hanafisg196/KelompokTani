<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kota $kota, Request $request)
    {
        $kota = $kota->when($request->has('search'), function ($query) use ($request) {
            $query->where('city_name', 'LIKE', '%' . $request->search . '%')
            ->orWhereHas('provinsi', function ($categoryQuery) use ($request) {
                $categoryQuery->where('prov_name', 'LIKE', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
        $provinsi = Provinsi::all();
        return view("kota.index",compact('kota','provinsi'));
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
            "city_name"=> "required",
            "id_prov"=> "required",
        ]);

        Kota::create($validatedData);
        return redirect("/kota")->with("success","Data Berhasil Ditambahkan!");
    }

    public function editkota(Request $request, $id_city)
    {
        if($request->isMethod("post")){
            $data = $request->all();
        }
        $kota = Kota::find($id_city);

        // Simpan data yang telah diedit
        $kota->city_name = $request->city_name;
        $kota->id_prov = $request->id_prov;
        $kota->save();
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
    public function destroy($id_kota)
    {
        // Temukan data kegiatan berdasarkan ID
        $kota = Kota::find($id_kota);

        // Jika data kota ditemukan, lakukan penghapusan
        if ($kota) {
            $kota->delete();
            return redirect('/kota')->with('success', 'Data berhasil dihapus.'); // Redirect dengan pesan sukses
        } else {
            return redirect('/kota')->with('error', 'Data tidak ditemukan.'); // Redirect dengan pesan error jika data tidak ditemukan
        }
    }
}
