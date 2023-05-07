<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('products.index')->with('products', Product::all());
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $image = $request->file('image');
        $imageName = rand() . '.' .  $request->file('image')->getClientOriginalExtension();
        $product->image = $imageName;
        $image->move(public_path('images'), $imageName);   // $image->storeAs('public/images', $imageName);
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        return view('products.show')->with('product', Product::find($id));
    }
    public function edit($id)
    {
        return view('products.edit')->with('product', Product::find($id));
    }
    public function update(Request $request, Product $product, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);
        $newImage = $request->file('image');
        $oldImage = $request->input('oldImage');
        if ($newImage) {
            // Delete the old image
            if ($oldImage) {
                unlink(public_path('images/' . $oldImage));
            }
            // Upload the new image
            $imageName = rand() . '.' .  $request->file('image')->getClientOriginalExtension();
            $newImage->move(public_path('images'), $imageName);
            // Update the product
            $product->image = $imageName;
        } else {
            $product->image = $oldImage;
        }
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->update();
        return redirect()->route('products.index')->with('success', 'Product Updated successfully.');
    }

    public function destroy($id)
    {
        $imagePath = public_path('images\\') . Product::find($id)->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
            Product::find($id)->delete();
        }
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
