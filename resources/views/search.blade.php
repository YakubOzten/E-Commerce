@extends('layout')

@section("sidebar")
      @include("sidebar")
@endsection

@section('content')
    <div class="col-xl-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="Elektronik">
                <div class="title8">

                    <p></p>
                </div>

                <div class="row g-sm-4 g-3">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 pb-1 ">
                            <div class="col-12 px-0 product_data" >
                                                                                        <p class="text-right">{{$product->qty}}</p>

                                <a href="{{url('musteri/category/'.$category->slug.'/'.$product->slug)}}" class="cat-img position-relative overflow-hidden mb-3">
                                    <img class="img-fluid" src="{{asset('/storage/images/products/'.$product->image)}}" alt="">
                                </a>
                                <h5 class="font-weight-semi-bold m-0">{{ $product->name }}</h5>
                                <p style="min-height: 50px">{{ $product->description }}</p>
                                <p><strong>Fiyatı: </strong> {{ $product->price }}$</p>
                                <p><strong>Stok Adedi: </strong> {{ $product->qty }}</p>
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}
                                                                 " class="btn btn-success me-3 float-start " role="button">Add to
                                                                        cart <i class="fa fa-shopping-cart"></i>   </a>
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start"> Favorilerime Ekle <i class="fa fa-heart"></i></button>
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
                </a>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.addToCartBtn').click(function (e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                $.ajax({
                    method: "POST",
                    url: "{{route('addtocart')}}",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        swal(response.status);
                    },

                });
            });
            $('.addToWishlist').click(function (e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                $.ajax({
                    method: "POST",
                    url: "/add-to-wishlist",
                    data: {
                        'product_id': product_id,
                        "_token": "{{ csrf_token() }}",

                    },
                    success: function (response) {
                        swal(response.status);
                    }

                });


            });



        })
    </script>
@endsection
