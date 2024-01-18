<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        
         $data = $category->latest()->paginate(10);
         return view("kategori.index")->with('data', $data);
        
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
    public function store(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required', 'max:30',
        ]);

        $category->create($validatedData);
        return redirect('/kategori')->with('success','Data berhasil ditambahkan!');
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
    public function edit(Category $category, $id)
    {
        $data = $category->find($id);
        return view("kategori.edit")->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Category $category)
    {
       $validatedData = $request->validate([
            'name' => 'required', 'max:30',
        ]);
        
            $data = $category->find($id);
            $data->update($validatedData);

        return redirect('/kategori')->with('success','Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category->destroy($id);
        
        return redirect('/kategori')->with('success','Data berhasil dihapus!');
    }
}
