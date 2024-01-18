<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
            $data = $product->paginate(10);
            return view("produk.index")->with('data', $data);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
    
        $categories = Category::all();
        return view('produk.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {

        $validatedData = $request->validate([
            'name' => 'required', 'max:100',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:5120',
            'category_id' => 'required',

        ]) ;

        if($request->file('image'))
        {
            $validatedData['image'] = $request->file('image')->store('image');
        }

        $validatedData['category_id'] = $request->input('category_id');

        $product->create($validatedData);
        return redirect('/produk')->with('success','Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        return view('produk.edit')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $categories = Category::all();
        return view('produk.edit')->with(['categories' => $categories, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'image' => 'image|file|max:5120',
            'category_id' => 'required',
        ]);
        
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('image');
        }
        
        $data = $product->find($id);
        $data->update($validatedData);
        
        return redirect('/produk')->with('success', 'Data berhasil diupdate!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        
        if($product->image)
        {
            Storage::delete($product->image);
        }
        $product->destroy($id);

        return redirect('/produk')->with('success', 'Data berhasil Di hapus!');
        
    }
}
