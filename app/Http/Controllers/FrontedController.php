<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontedController extends Controller
{
    public function home()

    {
        $products=Product::all();
        return view('fronted.index',compact('products'));
    }
}
