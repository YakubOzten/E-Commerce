

@extends('layout')

@section('title')
    Category
@endsection



@section('content')

<div class="py-5">
<div class="container-fluid">
    <div class="col-md-12">
        {{--            route('musteri-viewcat',$category->slug)--}}
        <h1>Katagoriler</h1>

        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3 mb-3">
                    <a href="{{route('musteri-viewcat',$category->slug)}}">
                    <div class="card">
                        <img  class="" height="250px" src="{{asset('/storage/images/Categories/'.$category->image)}}" alt="category">
                        <div class="card-body">
                            <h5>{{$category->name}}</h5>


                        </div>
                    </div>
                    </a>
         </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
