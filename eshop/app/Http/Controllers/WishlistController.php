<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){


        $wishlist=Wishlist::where('user_id',Auth::id())->get();
        return view('wishlist',compact('wishlist'));
    }
    public function add(Request $request){

                if (Auth::check())
                {
                    $prod_id=$request->input('product_id');
                    if (Product::find($prod_id)){
                        $wish=new Wishlist();
                        $wish->prod_id=$prod_id;
                        $wish->user_id=Auth::id();
                        $wish->save();
                        return response()->json(['status' => "Ürün Favorilerime eklendi."]);
                    }else{
                        return response()->json(['status' => "Ürün Bulunamadı"]);
                    }

                }else{
                    return response()->json(['status' => "Devam etmek için giriş yapın "]);
                }


    }
    public function deleteitem(Request $request){
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Ürün başariyla Beğendiklerimden silindi"]);
            }
        } else {
            return response()->json(['status' => "login on Continue"]);
        }


    }
    public function wishlistcount(){


        $wishcount=Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$wishcount]);


    }
}
