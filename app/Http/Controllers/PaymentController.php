<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class PaymentController extends Controller
{
    //  Strip Payment
    public function stripe($value)
    {
        return view('fronted.stripe',compact('value'));
    }



    // For post

    public function stripePost(Request $request,$value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $value*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
$fname=Auth::user()->name;
$lname=Auth::user()->lname;
$email=Auth::user()->email;

$pincode=Auth::user()->pincode;
$phone=Auth::user()->phone;
$address1=Auth::user()->address1;
$address2=Auth::user()->address2;
$city=Auth::user()->city;
$state=Auth::user()->state;
$country=Auth::user()->country;

$userid=Auth::user()->id;
$carts=Cart::where('user_id',$userid)->get();

 // Calculate Total Price

 $total = '0';
 $cartItems_total = Cart::where('user_id', Auth::id())->get();
 foreach ($cartItems_total as $cart) {
     $total += $cart->products->selling_price * $cart->prod_qty; 
 }


$order=new Order();
$order->fname=$fname;
$order->lname=$lname;
$order->phone=$phone;
$order->pincode=$pincode;
$order->email=$email;
$order->address1=$address1;
$order->address2=$address2;
$order->city=$city;
$order->state=$state;
$order->country=$country;
$order->user_id=$userid;
$order->status='0';
$order->total_price=$value;
$order->tracking_no=uniqid('TRACK');
$order->payment_status="paid";
$order->save();



// $order = Order::create([
//     'fname' => $fname,
//     'user_id' => Auth::id(),
//     'lname' => $lname,
//     'email' => $email,
//     'phone' => $phone,
//     'address1' => $address1,
//     'address2' => $address2,
//     'city' => $city,
//     'state' => $state,
//     'country' => $country,
//     'total_price' => $total,
//     'pincode' => $pincode,
//     'payment_status' =>'paid',
//     'status' => '0', // default status as pending
//     'message' => $request->message,
//     'tracking_no' => uniqid('TRACK'), // Generate a unique tracking number
    
// ]);

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

$cart_remove=Cart::where('user_id',$userid)->get();
foreach($cart_remove as $remove){
$data=Cart::find( $remove->id);
$data->delete();
}
Session::flash('success', 'Payment successful!');
// return redirect('/mycart');
return redirect('/my_cart');

//     }
}
}   