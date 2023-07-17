<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        //menampilkan form tambah kategori
        $categories = Categories::all();

        //membawa data produk yang di join dengan table kategori
        $products = Product::join('categories', 'categories.id', '=', 'products.categories_id')
            ->select('products.*', 'categories.name as nama_kategori')
            ->latest()->get();

        return view('admin.product.index', compact('products', 'categories'));
    }

    public function tambah()
    {

        return view('admin.product.tambah', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = Product::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'stok'          => $request->stok,
            'weigth'        => $request->weigth,
            'categories_id' => $request->categories_id,
            'image'         => $request->image

        ]);

        if ($request->hasfile('image')) {
            $imagePath = $request->file('image')->store('public/imageproducts');
            $data->image = $imagePath;
            $data->save();
        }
        return redirect()->route('admin.product')->with('success', 'Berhasil Menambah Produk Baru');
    }

    public function edit(Product $id)
    {
        return view('admin.product.edit', [
            'product'       => $id,
            'categories'    => Categories::all(),
        ]);
    }

    public function update(Product $id, ProductRequest $request)
    {
        $prod = $id;

         // Menghapus file gambar lama jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            Storage::delete($prod->image);
        }
        // $prod = Product::find($id);
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/imageproducts');
            $prod->image = $imagePath;
            $prod->update();  
        }

        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->price = $request->price;
        $prod->weigth = $request->weigth;
        $prod->categories_id = $request->categories_id;
        $prod->stok = $request->stok;
        
        $prod->update();

        return redirect()->route('admin.product')->with('success', 'Berhasil Mengubah Produk');
    }

    public function delete(Product $id)
    {
        
        //mengahapus produk
        Storage::delete('imageproducts/' . $id->image);
        $id->delete();

        return redirect()->route('admin.product')->with('success', 'Berhasil Menghapus Produk');
    }
}