@extends("/layouts/admin")

@section("sidebar")
    @include("/admin/sidebar")
@endsection

@section("content")


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <div class="container">
        <form method="post" action="{{route('yonetici-update',$product->id) }}" enctype="multipart/form-data" >
            @method("put")
            {{csrf_field()}}

            <div class="form-group">
                <label for="">isim</label>
                <input type="text" name="name" value="{{old('name')?? $product->name}}" class="form-control"  placeholder="">
            </div>
            <div class="form-group">
                <label for="">slug</label>
                <input type="text" name="slug" value="{{$product->slug}}" class="form-control"  placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Tanım</label>
                <input type="text" name="description" value="{{old('description')?? $product->description}}" class="form-control"  placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">fiyat</label>
                <input type="number"  name="price"value="{{old('price')?? $product->price}}"  class="form-control"  placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">stokmiktarı</label>
                <input type="number"   value="{{$product->qty}}" name="qty" class="form-control"  placeholder="">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <input type="checkbox" {{$product->status =="1" ?'checked':''}} name="status" >
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Kategori</label>
                <select  name="category_id"  class="form-control" id="exampleFormControlSelect1">
                    @foreach($categories as $category)
                        @if($product->category_id == $category->id)
                        <option selected value="{{$category->id}}" >{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if($product->image)
                <img src="{{asset('/storage/images/products/'.$product->image)}}" style="width: 350px " style="height: 200px " alt="Product image">
            @endif
            <div class="col-md-12">
                <input type="file" name="image" class="form-control">

            </div>
            <button class="btn btn-primary mt-3">Kaydet</button>
        </form>
    </div>
@endsection
