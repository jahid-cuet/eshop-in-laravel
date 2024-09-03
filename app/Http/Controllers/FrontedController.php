<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontedController extends Controller
{
    public function home()

    {
        $products=Product::where('trending','1')->take(15)->get();
        $categories=Category::where('popular','1')->take(15)->get();
        return view('fronted.index',compact('products','categories'));
    }
    public function front_category()

    {
        
        $categories=Category::all();
        return view('fronted.front_category',compact('categories'));
    }

    public function view_category($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id',$category->id)->get();
            return view('fronted.view_category',compact('category','products'));
        }
        else{
            return back()->withSuccess('Slug Does not Exist !!!');
        }

    }

    public function product_detail($id)
    {
        $product=Product::find($id);
        return view('fronted.product_detail',compact('product'));

    }
}
