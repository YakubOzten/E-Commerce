<?php


use App\Http\Controllers\Admin\YoneticiController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZiyaretciController;

use App\Http\Controllers\MusteriController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RatingController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "ziyaretci"], function () {
    Route::get("anasayfa", [ZiyaretciController::class, "index"])->name("ziyaretci-anasayfa");
});
//Route::middleware(['auth','isAdmin'])->group(function (){
Route::group(["prefix" => "yonetici"], function () {
    Route::get("anasayfa", [YoneticiController::class, "index"])->name("yonetici-anasayfa");
    Route::get("add-product", [YoneticiController::class, "create"])->name("yonetici-create");
    Route::post("add-product", [YoneticiController::class, "store"])->name("yonetici-createall");
    Route::get("edit-product/{product}", [YoneticiController::class, "edit"])->name("yonetici-edit");
    Route::delete("delete-product/{product}", [YoneticiController::class, "delete"])->name("yonetici-delete");
    Route::get('search-product', [YoneticiController::class, 'search'])->name('yonetici-search');
    Route::put("edit-product/{product?}", [YoneticiController::class, "update"])->name("yonetici-update");
    Route::get("cat-anasayfa", [YoneticiController::class, "category_index"])->name("yonetici-c_anasayfa");
    Route::get("add-category", [YoneticiController::class, "category_create"])->name("yonetici-c_create");
    Route::delete("delete-catproduct/{category}", [YoneticiController::class, "catdelete"])->name("yonetici-catdelete");
    Route::get("editcat-product/{category}", [YoneticiController::class, "catedit"])->name("yonetici-catedit");
    Route::post("add-category", [YoneticiController::class, "category_store"])->name("yonetici-c_createall");
    Route::post("add-product", [YoneticiController::class, "store"])->name("yonetici-createall");
    Route::put("editcat-product/{category?}", [YoneticiController::class, "cat_update"])->name("yonetici-catupdate");
   //Order Controlller

    Route::get("orders",[OrderController::class, "index"]);
    Route::get("view-orders/{id}'",[OrderController::class, "view"])->name('view-order');
    Route::put("update-order/{id}",[OrderController::class, "update_order"])->name('update');
    Route::get("order-history",[OrderController::class, "order_history"]);
    Route::get("users",[DashboardController::class, "users"])->name('users');
    Route::get("view-users/{id}'",[DashboardController::class, "viewuser"])->name('view-users');






});



//});



// müsteriler
Route::group(["prefix" => "musteri"], function () {
    Route::get('/product', [MusteriController::class, "index"])->name("customer.product");
//    Route::get('cart', [MusteriController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [MusteriController::class, 'addToCart'])->name('add.to.carts');
////  Route::patch('update-cart', [MusteriController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [MusteriController::class, 'remove'])->name('remove.from.cart');
    Route::get('search', [MusteriController::class, 'search']);
    Route::get("anasayfa", [MusteriController::class, "ffa"])->name("musteri-anasayfa");
    Route::get("compare", [MusteriController::class, "Productcompare"])->name("musteri-compare");


    Route::get('category', [MusteriController::class, 'category']);
    Route::get('category/{slug}', [MusteriController::class, 'viewcategory'])->name('musteri-viewcat');
    Route::get('category/{category_slug}/{product_slug}', [MusteriController::class, 'Detail'])->name('musteri-detail');
    Route::get('product-list', [MusteriController::class, 'productlistajax']);
    Route::post('searchproduct', [MusteriController::class, 'searchProduct'])->name('search-product');

});
//->middleware(["auth"])

Route::post('add-to-cart',[CartController::class,'addProduct'])->name("addtocart");
Route::post('delete-cart-item',[CartController::class,'deleteProduct'])->name("delete_cart_item");
Route::post('update-cart',[CartController::class,'updatecart'])->name("update-cart");
Route::post('add-to-wishlist',[WishlistController::class,'add'])->name('add-wishlist');
Route::post('delete-wishlist-item',[WishlistController::class,'deleteitem'])->name('delete-wishlist');
Route::get('load-card-data',[CartController::class,'cartcount'])->name('cart-count');
Route::get('load-wishlist-count',[WishlistController::class,'wishlistcount'])->name('wishlist-count');

Route::middleware(['auth'])->group(function (){
    Route::get('checkout', [CheckoutController::class, "Checkout"])->name("checkout");
    Route::get('cart',[CartController::class,'viewcart'])->name('cart');
    Route::post('place-order',[CheckoutController::class,'placeorder'])->name('place-orders');
    Route::get('my-orders',[UserController::class,'index'])->name('orders');
    Route::get('view-orders/{id}',[UserController::class,'view'])->name('view');
    Route::post('add-rating',[RatingController::class,'add'])->name('add-rating');
    Route::get('wishlist',[WishlistController::class,'index'])->name('wishlist');
    Route::post('proceed-to-pay',[CheckoutController::class,'razorpaycheck']);

});



//require __DIR__ . '/auth.php';
Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::middleware(['auth','isAdmin'])->group(function (){
//    Route::get('/dashboard', function () {
//        return view('admin.dashboard');
//    });
//});


