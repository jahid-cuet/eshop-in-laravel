<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function my_order()

    {
        $orders=Order::where('user_id',Auth::id())->get();
        return view('fronted.my_order',compact('orders'));
    }
    public function view_order($id)

    {
        $orders=Order::where('id',$id)->where('user_id',Auth::id())->get();
        return view('fronted.view_order',compact('orders'));
    }
    
}
