<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //index
    public function index()
    {
        $products = Product::latest()->get();
        return view('pages.product.index', compact('products'));
    }

    //create
    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create', compact('categories'));
    }

    //store
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
            'price'   => 'required',
            'stock'   => 'required',
            'category_id'   => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/produk', $image->hashName());

        //create post
        Product::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'price'   => $request->price,
            'stock'   => $request->stock,
            'category_id'   => $request->category_id,
        ]);

        //redirect to index
        return redirect()->route('product.index')->with([
            'message' => 'Data Berhasil Disimpan!',
            'alert-type' => 'success'
        ]);
    }


    //edit
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('pages.product.edit', compact('products','categories'));
    }

    //update
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
            'price'   => 'required',
            'stock'   => 'required',
            'category_id'   => 'required',
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/produk', $image->hashName());

            //delete old image
            Storage::delete('public/produk/'.$product->image);

            //update product with new image
            $product->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'price'   => $request->price,
                'stock'   => $request->stock,
                'category_id'   => $request->category_id,
            ]);

        } else {

            //update product without image
            $product->update([
                'name'     => $request->name,
                'price'   => $request->price,
                'stock'   => $request->stock,
                'category_id'   => $request->category_id,
            ]);
        }

        //redirect to index
        return redirect()->route('product.index')->with([
            'message' => 'Data Berhasil Diedit!',
        'alert-type' => 'success'
    ]);
    }

    //destroy
    public function destroy($id)
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //delete image
        Storage::delete('public/produk/'. $product->image);

        //delete product
        $product->delete();

        //redirect to index
        return redirect()->route('product.index')->with([
            'message' => 'Data Berhasil Dihapus!',
        'alert-type' => 'success'
    ]);
    }
}
