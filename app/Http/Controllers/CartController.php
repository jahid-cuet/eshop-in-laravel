<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('quantity');

        if (Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check)
            {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => 'Already Added to Cart !!!'], 409); // Conflict status code
                }

                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();

                return response()->json(['status' => 'Cart Added successfully!!!'], 200); // OK status code
            }

            return response()->json(['status' => 'Product not found'], 404); // Not found status code
        }
        else
        {
            return response()->json(['status' => 'User not authenticated'], 401); // Unauthorized status code
        }
    }
}
