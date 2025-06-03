<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Product;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $products = Product::latest()->paginate(10);

        //render view with products
        return view('products.index', compact('products'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create() : View
    {
        return view('products.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        //validate form
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        //create product
        Product::create([
            'image'       => $image->hashName(),
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock
        ]);

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Summary of show
     * @param mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //Get Produk by id
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * update
     * 
     * @param mixed $requst
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
    // Validasi form
        $request->validate([
            'image'       => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

    // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

    // Cek apakah ada file gambar diunggah
        if ($request->hasFile('image')) {
        // Upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

        // Hapus gambar lama
            Storage::delete('public/products/' . $product->image);

        // Update produk dengan gambar baru
            $product->update([
            'image'       => $image->hashName(),
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock
            ]);
        } else {
        // Update produk tanpa mengubah gambar
            $product->update([
                'title'       => $request->title,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock
            ]);
        }

    // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
    // Ambil produk berdasarkan ID
            $product = Product::findOrFail($id);
    // Hapus gambar dari storage
        Storage::delete('public/products/' . $product->image);
    // Hapus data produk dari database
        $product->delete();
    // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
