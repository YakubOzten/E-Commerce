<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Illuminate\Pagination\Paginator;


class YoneticiController extends Controller
{
//    public function __construct()
//    {
    //        //   $this->middleware(["auth","verified","can:yonetici"]);
//    }


    public function index()
    {
//        $data["title"] = "anasayfa";
//        $data["content"] = view("admin.urunler.main");
        $products = Product::with('category')->paginate(5);

        return view("admin.main", compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|min:2',
         'price'=> 'required'
        ]);
            $input = $request->all();
            $products=new Product();
  if ($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('storage/images/products/',$filename);
            $products->image=$filename;
        }
        $products->category_id=$request->input('category_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->description=$request->input('description');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status') == TRUE ? '1' : '0';
        $products->price=$request->input('price');
        $products->save();


//        session()-> flash('message',$input['name'].' kaydı başarılı.');
        return redirect('yonetici/anasayfa');
    }

    public function edit($product)
    {
        $categories = Category::all();
        $product = Product::find($product);
        return view('admin.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $pr_id)
    {


        $input = $request->all();
        $products = Product::find($pr_id);
        if ($request->hasFile('image')){
            $path='storage/images/products/'.$products->image;
            if (File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('storage/images/products/',$filename);
            $products->image=$filename;
        }
        $products->category_id=$request->input('category_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->description=$request->input('description');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status') == TRUE ? '1' : '0';
        $products->price=$request->input('price');
        $products->update();


        session()->flash('message',$input['name'].' Güncelleme başarılı.');


        return redirect()->route('yonetici-anasayfa');
    }

    public function delete($product)
    {
        Product::find($product)->delete();

        session()->flash('message','Ürün  Silme işlemi başarılı.');
        return redirect()->back();
    }
    public function category_index()
    {
        $data["title"] = "anasayfa";
//        $data["content"] = view("admin.urunler.main");
//        $categories = Category::all();

        $categories=DB::table('categories')->paginate(5);


        return view("admin.catmain", compact('categories',));
    }

    public function category_create()
    {
        $categories = Category::all();
        return view('admin.catcreate', compact('categories'));
    }
    public function catedit($category)
    {
        $category = Category::find($category);
        return view('admin.catedit', compact( 'category'));
    }


    public function category_store(Request $request)
    {

        $input = $request->all();
        $category=new Category();
        if ($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('storage/images/Categories/',$filename);
            $category->image=$filename;
        }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->save();
        session()-> flash('message',$input['name'].' kaydı başarılı.');
        return redirect('yonetici/cat-anasayfa');
    }
public function cat_update(Request $request, $pr_id){
    $input = $request->all();
    $category = Category::find($pr_id);
    if ($request->hasFile('image')){
        $path='storage/images/Categories/'.$category->image;
        if (File::exists($path))
        {
            File::delete($path);
        }
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
        $file->move('storage/images/Categories/',$filename);
        $category->image=$filename;
    }
    $category->name=$request->input('name');
    $category->slug=$request->input('slug');
    $category->description=$request->input('description');
    $category->update();
    session()->flash('message',$input['name'].' Güncelleme başarılı.');
    return redirect('yonetici/cat-anasayfa');
}
        public function catdelete($category)
        {
            Category::find($category)->delete();

            session()->flash('message','Ürün  Silme işlemi başarılı.');
            return redirect()->back();
        }
    public function search(Request $request)
{
    $products = Product::query();

    $name = $request->name;
    $price = $request->price;
    $description = $request->description;
    $category_id = $request->category_id;

    if ($name) {
        $products->where('name', 'LIKE', '%' . $name . '%');
    }
    if ($price) {
        $products->where('price', 'LIKE', '%' . $price . '%');
    }

    if ($description) {
        $products->where('description', 'LIKE', '%' . $description . '%');
    }

    if ($category_id) {
        $products->where('category_id', $category_id);
    }
    $data = [
        'category_id' => $category_id,
        'description' => $description,
        'name' => $name,
        'price' => $price,
        'products' => $products->latest()->simplePaginate(20),
    ];

    return view('admin.main', $data);
}



}

