<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("provinsi.index",[
            "provinsi" => Provinsi::all()
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

    public function generateslug($slug)
    {
        // $this->authorize('admin');
        $jumlah = Provinsi::where('slug','like','%'.$slug.'%')->count();
        if($jumlah > 0){
            return $slug.'-'.($jumlah+1);
        }
        return $slug;
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
            "prov_name"=> "required",
        ]);
        $validatedData['slug'] = $this->generateslug($request->slug);
        Provinsi::create($validatedData);
        return redirect("/provinsi")->with("success","Data Berhasil Ditambahkan!");
    }

    public function editprovinsi(Request $request, $id_prov)
    {
        if($request->isMethod("post")){
            $data = $request->all();
        }
        $provinsi = Provinsi::find($id_prov);

        // Simpan data yang telah diedit
        $provinsi->prov_name = $request->prov_name;
        $provinsi->save();
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
    public function destroy($id_prov)
    {
        // Temukan data kegiatan berdasarkan ID
        $provinsi = Provinsi::find($id_prov);

        // Jika data provinsi ditemukan, lakukan penghapusan
        if ($provinsi) {
            $provinsi->delete();
            return redirect('/provinsi')->with('success', 'Data berhasil dihapus.'); // Redirect dengan pesan sukses
        } else {
            return redirect('/provinsi')->with('error', 'Data tidak ditemukan.'); // Redirect dengan pesan error jika data tidak ditemukan
        }
    }
}
