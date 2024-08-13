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
        
        $categories=Category::where('status','0')->take(15)->get();
        return view('fronted.front_category',compact('categories'));
    }
}
