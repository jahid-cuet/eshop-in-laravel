<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function show_product()
    {
        $products=Product::all();
        return view('admin.show_product',compact('products'));
    }
    
    public function edit_product($id)
    {
        $product=Product::find($id);
        $categories=Category::all();
        return view('admin.edit_product',compact('product','categories'));
    }

    public function update_product(Request $request,$id)
    {
         // Validation
         $request->validate([
            'cate_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'image' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|numeric',
            'tax' => 'required|numeric',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
        ]);

     
       

        // Create new product
        $product =Product::find($id);
        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->tax = $request->tax;
        $product->status = ($request->status) ==TRUE ?'1':'0';
        $product->trending = ($request->trending) ==TRUE ?'1':'0';

               // Handle the image upload
               if ($request->hasFile('image')) {
                $path = public_path('pro/' . $product->image);
    
                if (File::exists($path)) {
                    File::delete($path);
                }
    
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('pro'), $imageName);
                $product->image = $imageName;
            }
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Product Updated successfully');
    }

    public function delete_product($id)
    {
        $product=Product::find($id);

        if ($product->image) {
            $path = public_path('pro/' . $product->image);
    
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully!!!');
        return redirect()->back();


    }
}
