<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::user()->id)->exists()) {
                    return response()->json(['status' => $prod_check->name . "  already Added to Cart"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::user()->id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();

                    return response()->json(['status' => $prod_check->name . "  Added to Cart"]);
                }
            }
        } else {
            return response()->json(['status' => "login on Continue"]);
        }

    }

    public function updatecart(Request $request)
    {

        $prod_id = $request->input('prod_id');

        $product_qty = $request->input('prod_qty');

        if (Auth::check()) {

            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {

                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;

                $cart->update();
                return response()->json(['status' => "Quantity Güncellendi"]);
            }
        } else {
            return response()->json(['status' => "login on Continue"]);
        }

    }

    public function deleteProduct(Request $request)
    {

        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Ürün başariyla silindi"]);
            }
        } else {
            return response()->json(['status' => "login on Continue"]);
        }
    }

    public function viewcart()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();


        return view('cart', compact('cartitems'));
    }

    public function cartcount(){
        $cartcount=Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }


}
