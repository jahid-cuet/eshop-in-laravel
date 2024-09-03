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
    public function view_orders()

    {
        $orders=Order::all();
        return view('admin.view_orders',compact('orders'));
    }

    public function admin_view_order($id)

    {
        $orders=Order::where('id',$id)->get();
        return view('admin.admin_view_order',compact('orders'));
    }
    public function update(Request $request, $id)
    {
        // Find the order by ID
        $order = Order::find($id);
    
        // Check if the order was found
        if ($order) {
            // Update the order status
            $order->status = $request->input('order-status');
            $order->save();
            
            return redirect('view_orders')->with('status', 'Order updated successfully');
        } else {
            return redirect('view_orders')->with('error', 'Order not found');
        }
    }


    public function order_history()

    {
        $orders=Order::where('status','1')->get();
        return view('admin.order_history',compact('orders'));
    }
    
    
}
