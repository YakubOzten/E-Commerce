@extends("/layouts/admin")




@section("sidebar")
    @include("/admin/sidebar")
@endsection

@section("content")

{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"--}}
{{--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    <div class="container">

        <h3>Products</h3>

        <a class="btn btn-primary float-right mb-4" href="{{ route('yonetici-c_create')}}">Add product</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Categoriler</th>
                <th scope="col">slug</th>
                <th scope="col">İmage</th>
                <th scope="col">Olusturulma zamanı</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td><img height="60px" src="{{asset('/storage/images/Categories/'.$category->image)}}"></td>
                    <td>{{$category->created_at}}</td>
                    <td style="display:flex">
                        <div>
                            <a href="{{url('/yonetici/editcat-product/'.$category->id)}}" class="btn btn-primary">Edit </a>
                        </div>
                        <form action="{{route('yonetici-catdelete',$category->id)}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-danger " type="submit">Sil</button>
                        </form>
            @endforeach
            </tbody>
        </table>
    </div>


    @if ($categories->hasPages())
        <div class="pagination-wrapper">
            {{ $categories->links() }}
        </div>
    @endif

@endsection

