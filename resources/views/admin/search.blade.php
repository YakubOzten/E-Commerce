@extends("/layouts/admin")




@section("sidebar")
    @include("/admin/sidebar")
@endsection


@section("content")
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->category->name}}</td>
            <td style="display:flex">
                <div>
                    <a href="{{url('/yonetici/edit-product/'.$product->id)}}" class="btn btn-primary">Edit  </a></div>
                <form action="{{url('/yonetici/delete-product/'.$product->id)}}" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class="btn btn-danger " type="submit">Sil</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
