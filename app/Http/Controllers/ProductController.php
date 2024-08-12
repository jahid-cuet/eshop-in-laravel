<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_product()

    {
        $categories=Category::all();
        return view('admin.add_product',compact('categories'));
    }
    public function store_product(Request $request)
    {
        // Validation
        $request->validate([
            'cate_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|numeric',
            'tax' => 'required|numeric',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
        ]);

     
       

        // Create new product
        $product = new Product();
        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->tax = $request->tax;
        $product->status = $request->status ? 1 : 0;
        $product->trending = $request->trending ? 1 : 0;

           // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('pro'), $imageName);
            $product->image = $imageName;
        }
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_descrip;
        $product->meta_keywords = $request->meta_keywords;
        $product->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Product added successfully');
    }
}
