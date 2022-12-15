<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;


class MusteriController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories=Category::all();
        return view('products', compact('products','categories'));


    }
//    public function search($slug){
//
//
//        if (Category::where('slug', $slug)->exists()){
//            $search_text=$_GET['query'];
//            $products=Product::where('name','LIKE','%'.$search_text.'%')->with('category')->get();
//            $category=Category::where('slug', $slug)->first();
//            return view('products',compact('category','products'));
//        }
//        else{
//            return  redirect('products')->with('status',"Slug doesnot exists");
//        }
//
//      return view('search',compact('products'));
//    }
    public function cart()
    {
        return view('cart');
    }
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {

            $prod_check = Product::where('id',$product_id)->first();

            if ($prod_check) {



                if (Cart::where('prod_id',$product_id)->where('user_id',Auth::user()->id)->exists())
                {
                    return response()->json(['status' => $prod_check->name."  already Added to Cart"]);
                }
                else {



                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::user()->id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();

                    return response()->json(['status' => $prod_check->name."  Added to Cart"]);
                }
            }
        } else {
            return response()->json(['status' => "login on Continue"]);
        }

    }

//    public function addToCart($id)
//    {
//        $product = Product::findOrFail($id);
//
//        $cart = session()->get('cart', []);
//
//        if (isset($cart[$id])) {
//            $cart[$id]['quantity']++;
//        } else {
//            $cart[$id] = [
//                "name" => $product->name,
//                "quantity" => $product->qty,
//                "price" => $product->price,
//                "image" => $product->image
//            ];
//        }
//
//        session()->put('cart', $cart);
//        return redirect()->back()->with('success', 'Product added to cart successfully!');
//    }


    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }

    }
    public  function category(){
            $categories = Category::all();

         return view('category', compact('categories'));
    }
public  function viewcategory($slug){
        if (Category::where('slug', $slug)->exists()){
            $products = Product::with('category')->paginate(5);
            $category=Category::where('slug', $slug)->first();
            $products=Product::where('category_id', $category->id)->where('status','0')->paginate(5);
                return view('products',compact('category','products'));
        }
        else{
            return  redirect('products')->with('status',"Slug doesnot exists");
        }

}
public  function Detail($category_slug,$product_slug){
        if (Category::where('slug',$category_slug)->exists()){

            if (Product::where('slug',$product_slug)->exists()){
                $products=Product::where('slug',$product_slug)->first();
                $ratings = Rating::where('prod_id',$products->id)->get();
                $rating_sum=Rating::where('prod_id',$products->id)->sum('stars_rated');
                $user_rating=Rating::where('prod_id',$products->id)->where('user_id',Auth::id())->first();
                if ($ratings->count()>0)
                {
                    $rating_value=$rating_sum/$ratings->count();
                }else{
                    $rating_value=0;
                }

                return view('detail',compact('products','ratings','rating_value','user_rating'));
            }
            else{
                return redirect('products')->with('status',"Bağlantı koptu");
            }
        }else {
            return redirect('products')->with('status',"Böyle bir kategori bulunamadı");
        }
}

public function productlistajax(){

        $products=Product::select('name')->where('status','0')->get();
        $data = [];
        foreach ($products as $item){
            $data[]=$item['name'];
        }
        return $data;

}
public function searchProduct(Request $request){
        $searched_product=$request->product_name;

        if ($searched_product != ""){

            $product=Product::where("name","LIKE","%".$searched_product."%")->first();
            if ($product)
            {
                return redirect('musteri/category/'.$product->category->slug.'/'.$product->slug);
            }else{
                return  redirect()->back()->with("status","Aradığınız Ürün Bulunamadı");
            }

        }
     else {
            return redirect()->back();
}
}







}

















