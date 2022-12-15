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
    public function Checkout()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view("checkout", compact('cartitems'));
    }

    public function placeorder(Request $request)
    {

        $order = new Order();
        $order->user_id = Auth::id();
        $order->firstname = $request->input('firstname');
        $order->lastname = $request->input('lastname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->adress1 = $request->input('adress1');
        $order->adress2 = $request->input('adress2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->postcode = $request->input('postcode');

        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');

        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
//        * $prod->products->qty
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->price * $prod->prod_qty;
        }
        $order->total_price = $total;
        $order->tracking_no = 'jacob' . rand(1111, 9999);


        $order->save();


        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->price,
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        if (Auth::user()->adress1 == null) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->adress1 = $request->input('adress1');
            $user->adress2 = $request->input('adress2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->postcode = $request->input('postcode');
            $user->update();

        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        if ($request->input('payment_mode') == "Paid by Razorpay") {
            return response()->json(['status' => "Sipariş verme işleminiz tamamlandı"]);
        }

        return redirect('musteri/category')->with('status', "Sipariş verme işleminiz tamamlandı");
    }

    public function razorpaycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($cartitems as $item) {
            $total_price += $item->products->price * $item->prod_qty;
        }
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $country = $request->input('country');
        $adress1 = $request->input('adress1');
        $adress2 = $request->input('adress2');
        $city = $request->input('city');
        $state = $request->input('state');
        $postcode = $request->input('postcode');

        return response()->json([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'email' => $email,
            'country' => $country,
            'adress1' => $adress1,
            'adress2' => $adress2,
            'city' => $city,
            'state' => $state,
            'postcode' => $postcode,
            'total_price' => $total_price

        ]);

    }
}
