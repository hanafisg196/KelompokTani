<?php

namespace App\Http\Controllers;

use App\Models\Ketua;
use Illuminate\Http\Request;

class KetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Ketua::latest()->get();
      return view("ketua.index")->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->view('ketua.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ketua $ketua)
    {
        $validatedData = $request->validate([
            'nama' => 'required', 'max:100',
            'alamat' => 'required',
            'email' => 'required','email',
            'nohp' => 'required'
        ]);

        $ketua->create($validatedData);

        return redirect('/ketua')
               ->with('success','Data berhasil ditambahkan!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $data = Ketua::find($id);
        return view('ketua.edit')->with('data', $data);
      
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ketua::find($id);
        return view('ketua.edit')->with('data', $data);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $ketua = Ketua::all();
        $validatedData = $request->validate([
            'nama' => 'required', 'max:100',
            'alamat' => 'required',
            'email' => 'required','email',
            'nohp' => 'required'
        ]);

         $data = $ketua->find($id);
         $data->update($validatedData);

        return redirect('/ketua')
               ->with('success','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ketua = Ketua::find($id);
        
        $ketua->destroy($id);
         return redirect('/ketua')
               ->with('success','Data berhasil diupdate!');
    }
}
