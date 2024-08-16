<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
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

    }
}
