@extends('layout')




@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <a href="{{url('musteri/category')}}">Koleksiyon</a>/
        <a href="{{url('musteri/category/'.$category->slug)}}"> {{$category->name}} </a>
    </div>
</div>
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
{{--                <div class="border-bottom mb-4 pb-4">--}}
{{--                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>--}}
{{--                    <form>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" checked id="price-all">--}}
{{--                            <label class="custom-control-label" for="price-all">All Price</label>--}}
{{--                            <span class="badge border font-weight-normal">1000</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="price-1">--}}
{{--                            <label class="custom-control-label" for="price-1">$0 - $100</label>--}}
{{--                            <span class="badge border font-weight-normal">150</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="price-2">--}}
{{--                            <label class="custom-control-label" for="price-2">$100 - $200</label>--}}
{{--                            <span class="badge border font-weight-normal">295</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="price-3">--}}
{{--                            <label class="custom-control-label" for="price-3">$200 - $300</label>--}}
{{--                            <span class="badge border font-weight-normal">246</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="price-4">--}}
{{--                            <label class="custom-control-label" for="price-4">$300 - $400</label>--}}
{{--                            <span class="badge border font-weight-normal">145</span>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="price-5">--}}
{{--                            <label class="custom-control-label" for="price-5">$400 - $500</label>--}}
{{--                            <span class="badge border font-weight-normal">168</span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
                <!-- Price End -->

                <!-- Color Start -->
{{--                <div class="border-bottom mb-4 pb-4">--}}
{{--                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>--}}
{{--                    <form>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" checked id="color-all">--}}
{{--                            <label class="custom-control-label" for="price-all">All Color</label>--}}
{{--                            <span class="badge border font-weight-normal">1000</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="color-1">--}}
{{--                            <label class="custom-control-label" for="color-1">Black</label>--}}
{{--                            <span class="badge border font-weight-normal">150</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="color-2">--}}
{{--                            <label class="custom-control-label" for="color-2">White</label>--}}
{{--                            <span class="badge border font-weight-normal">295</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="color-3">--}}
{{--                            <label class="custom-control-label" for="color-3">Red</label>--}}
{{--                            <span class="badge border font-weight-normal">246</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="color-4">--}}
{{--                            <label class="custom-control-label" for="color-4">Blue</label>--}}
{{--                            <span class="badge border font-weight-normal">145</span>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="color-5">--}}
{{--                            <label class="custom-control-label" for="color-5">Green</label>--}}
{{--                            <span class="badge border font-weight-normal">168</span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
                <!-- Color End -->

                <!-- Size Start -->
{{--                <div class="mb-5">--}}
{{--                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>--}}
{{--                    <form>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" checked id="size-all">--}}
{{--                            <label class="custom-control-label" for="size-all">All Size</label>--}}
{{--                            <span class="badge border font-weight-normal">1000</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="size-1">--}}
{{--                            <label class="custom-control-label" for="size-1">XS</label>--}}
{{--                            <span class="badge border font-weight-normal">150</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="size-2">--}}
{{--                            <label class="custom-control-label" for="size-2">S</label>--}}
{{--                            <span class="badge border font-weight-normal">295</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="size-3">--}}
{{--                            <label class="custom-control-label" for="size-3">M</label>--}}
{{--                            <span class="badge border font-weight-normal">246</span>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="size-4">--}}
{{--                            <label class="custom-control-label" for="size-4">L</label>--}}
{{--                            <span class="badge border font-weight-normal">145</span>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="size-5">--}}
{{--                            <label class="custom-control-label" for="size-5">XL</label>--}}
{{--                            <span class="badge border font-weight-normal">168</span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
                <!-- Size End -->
            </div>

            <div class="container-fluid ">
                <div class=" row ">
                    @foreach($products as $product)

                        <div class="col-lg-4 col-md-6 pb-1 ">
                            <div class="col-12 px-0 product_data" style="height: 600px" >
{{--                                                        <p class="text-right">{{$product->qty}}</p>--}}

        <a href="{{url('musteri/category/'.$category->slug.'/'.$product->slug)}}" class="card-img cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid " src="{{asset('/storage/images/products/'.$product->image)}}" style="min-height: 510px" alt="">
        </a>


                                <h5 class="font-weight-semi-bold m-0">{{ $product->name }}</h5>
                                <p style="min-height: 50px">{{ $product->description }}</p>
                                <p><strong>Fiyatı: </strong> {{ $product->price }}$</p>
                                <p><strong>Stok Adedi: </strong> {{ $product->qty }}</p>
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
{{--                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}--}}
{{--                                 " class="btn btn-success me-3 float-start " role="button">Add to--}}
{{--                                        cart <i class="fa fa-shopping-cart"></i>   </a>--}}
                                    <button type="button" class="btn btn-success me-3 addToWishlist float-start"> Favorilerime Ekle <i class="fa fa-heart"></i></button>
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    @if ($products->hasPages())
        <div class="pagination-wrapper">
            {{ $products->links() }}
        </div>
    @endif





    <!-- Shop End -->


    <!-- Footer Start -->


    <!-- Footer End -->
@endsection

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
{{--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="/lib/easing/easing.min.js"></script>--}}
{{--<script src="/lib/owlcarousel/owl.carousel.min.js"></script>--}}

{{--<!-- Contact Javascript File -->--}}
{{--<script src="/mail/jqBootstrapValidation.min.js"></script>--}}
{{--<script src="/mail/contact.js"></script>--}}

{{--<!-- Template Javascript -->--}}
<script src="/js/main.js"></script>

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








