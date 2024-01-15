<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //index
    public function index()
    {
        $categories = Category::latest()->get();
        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
            'description'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/kategori', $image->hashName());

        //create post
        Category::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'description'   => $request->description
        ]);

        //redirect to index
        return redirect()->route('category.index')->with([
            'message' => 'Data Berhasil Disimpan!',
            'alert-type' => 'success'
        ]);
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('pages.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'          => 'required',
            'description'   => 'required'
        ]);

        //get post by ID
        $category = Category::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/kategori', $image->hashName());

            //delete old image
            Storage::delete('public/kategori/'.$category->image);

            //update category with new image
            $category->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'description'   => $request->description
            ]);

        } else {

            //update category without image
            $category->update([
                'name'     => $request->name,
                'description'   => $request->description
            ]);
        }

        //redirect to index
        return redirect()->route('category.index')->with([
            'message' => 'Data Berhasil Diedit!',
        'alert-type' => 'success'
    ]);
    }

    public function destroy($id)
    {
        //get category by ID
        $category = Category::findOrFail($id);

        //delete image
        Storage::delete('public/kategori/'. $category->image);

        //delete category
        $category->delete();

        //redirect to index
        return redirect()->route('category.index')->with([
            'message' => 'Data Berhasil Dihapus!',
        'alert-type' => 'success'
    ]);
    }
}
