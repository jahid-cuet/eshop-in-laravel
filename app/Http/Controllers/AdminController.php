<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $userCount = User::all()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        return view('admin.index',compact('userCount','product','order'));
    }


}
