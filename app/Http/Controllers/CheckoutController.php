<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {

        
        $old_cartItems=Cart::where('user_id',Auth::id())->get();
        foreach($old_cartItems as $cart)
        {

            if(!Product::where('id',$cart->prod_id)->where('quantity','>=',$cart->prod_qty)->exists())
            {
            $removeItem=Cart::Where('user_id',Auth::id())->where('prod_id',$cart->prod_id)->first();
            $removeItem->delete();
            }
            }
        $cartItems=Cart::where('user_id',Auth::id())->get();

       
        return view('fronted.checkout',compact('cartItems'));
    }


    public function placeorder(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
        ]);

        $order = Order::create([
            'fname' => $request->fname,
            'user_id' => Auth::id(),
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
            'status' => 0, // default status as pending
            'message' => $request->message,
            'tracking_no' => uniqid('TRACK'), // Generate a unique tracking number
        ]);

        // Optionally handle the cart items association if needed
        // Assuming you have a cart_items table and a relationship defined in your Order model
        $cartItems=Cart::where('user_id',Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' =>$order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod=Product::where('id',$item->prod_id)->first();
            $prod->quantity=$prod->quantity- $item->prod_qty;
            $prod->save();
        }

        if(Auth::user()->address1 == NULL){
            $user=User::where('id',Auth::id())->first();
            $user->lname=$request->lname;
            $user->phone=$request->phone;
            $user->address1=$request->address1;
            $user->address2=$request->address2;
            $user->city=$request->city;
            $user->state=$request->state;
            $user->country=$request->country;
            $user->pincode=$request->pincode;
            $user->save();
        }
        $cartItems=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('status', 'Order placed successfully!');
    }
}


