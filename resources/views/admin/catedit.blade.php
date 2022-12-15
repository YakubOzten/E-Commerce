@extends("/layouts/admin")

@section("sidebar")
    @include("/admin/sidebar")
@endsection

@section("content")


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <div class="container">
        <form method="post" action="{{route('yonetici-catupdate',$category->id) }}" enctype="multipart/form-data">
            @method("put")
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">categori ismi</label>
                <input type="text" name="name" value="{{old('name')?? $category->name}}" class="form-control"  placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">categori CIO ismi</label>
                <input type="text" name="slug"  value="{{old('slug')?? $category->slug}}" class="form-control"  placeholder="">
            </div>



            <div class="form-group mt-4">
                <label for="exampleFormControlfile1">Ürün resimi Seç</label>
                <input type="file" name="image" value="{{old('image')?? $category->image}}"  class="form-control-file" id="exampleFormControlfile1">
            </div>


            <button class="btn btn-primary mt-3">Kaydet</button>
        </form>
    </div>
@endsection
