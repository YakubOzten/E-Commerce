@extends('layout')


    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->

<!-- Topbar End -->


<!-- Navbar Start -->

<!-- Navbar End -->

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  action="{{route('add-rating')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$products->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{ $products->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if($user_rating)

                                @for($i=1;$i<=$user_rating->stars_rated;$i++)
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                                @for($j=$user_rating->stars_rated+1;$j<= 5;$j++)
                                        <input type="radio" value="{{$j}}" name="product_rating"  id="rating{{$j}}">
                                        <label for="rating{{$j}}" class="fa fa-star"></label>
                                @endfor
                            @else
                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <a href="{{url('musteri/category')}}">Koleksiyon</a>/
            <a href="{{url('musteri/category/'.$products->category->slug)}}"> {{$products->category->name}} </a>/
            <a href="{{url('musteri/category/'.$products->category->slug.'/'.$products->slug)}}">{{$products->name}} </a>

        </div>
    </div>



    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5 ">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset('/storage/images/products/'.$products->image)}}"
                                 alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('/storage/images/products/'.$products->image)}}"
                                 alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('/storage/images/products/'.$products->image)}}"
                                 alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('/storage/images/products/'.$products->image)}}"
                                 alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5  ">
                <h3 class="font-weight-semi-bold ">{{ $products->name }}</h3>
                <div class="d-flex mb-3">
                   @php $ratenum =number_format($rating_value) @endphp
                    <div class="rating">

                        @for($i=1;$i<=$ratenum;$i++)
                        <i class="fa fa-star checked"></i>
                        @endfor
                       @for($j=$ratenum+1;$j<= 5;$j++)
                        <i class="fa fa-star"></i>
                            @endfor

                            <span>
                                @if ($ratings->count()>0)

                                {{$ratings->count()}} Değerlendirme
                                @else
                                 Değerlendirme yok

                                @endif
                            </span>
                    </div>

                </div>
                <h3 class="font-weight-semi-bold mb-4">${{ $products->price }}</h3>
                <p class="mb-4">{{ $products->description }}</p>

{{--                <div class="d-flex mb-3">--}}
{{--                    <p class="text-dark font-weight-medium mb-0 mr-3 ">Sizes:</p>--}}
{{--                    <form>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="size-1" name="size">--}}
{{--                            <label class="custom-control-label" for="size-1">XS</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="size-2" name="size">--}}
{{--                            <label class="custom-control-label" for="size-2">S</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="size-3" name="size">--}}
{{--                            <label class="custom-control-label" for="size-3">M</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="size-4" name="size">--}}
{{--                            <label class="custom-control-label" for="size-4">L</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="size-5" name="size">--}}
{{--                            <label class="custom-control-label" for="size-5">XL</label>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="d-flex mb-4">--}}
{{--                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>--}}
{{--                    <form>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="color-1" name="color">--}}
{{--                            <label class="custom-control-label" for="color-1">Black</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="color-2" name="color">--}}
{{--                            <label class="custom-control-label" for="color-2">White</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="color-3" name="color">--}}
{{--                            <label class="custom-control-label" for="color-3">Red</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="color-4" name="color">--}}
{{--                            <label class="custom-control-label" for="color-4">Blue</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio custom-control-inline">--}}
{{--                            <input type="radio" class="custom-control-input" id="color-5" name="color">--}}
{{--                            <label class="custom-control-label" for="color-5">Green</label>--}}
{{--                        </div>--}}

{{--                    </form>--}}
{{--                </div>--}}
                @if($products->qty > 0)
                    <label class="badge bg-success " style="color:black">Stok Durumu:Mevcut </label>
                @else
                    <label class="badge bg-danger">Stokta Henüz yok.</label>
                @endif
                <div class="row mt-3 product_data">
                    <div class="col-md-3  ">
                        <input type="hidden" value="{{$products->id}}" class="prod_id">
                        <label for="Quantity">Adet</label>
                        <div class="input-group text-center mb-3" style="width: 130px">
                            <button   class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                            <button   class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <br/>
                        @if($products->qty > 0)
                            <button  type="button"
                                     class="btn btn-primary me-3  addToCartBtn float-start">Sepete Ekle <i
                                    style="color:#0f5132;" class="fa fa-shopping-cart"></i></button>

                        @endif

                        <button type="button" class="btn btn-success me-3 addToWishlist float-start"> Favorilerime Ekle <i
                                style="color:pink;" class="fa fa-heart "></i></button>
                        {{--   <p class="btn-holder"><a --}}{{--href="{{ route('add.to.cart', $products->id) }}"--}}
                        {{--                    class="btn btn-success me-3  float-start " onclick="" role="button">Add to cart <i class="fa fa-shopping-cart"></i> </a>--}}
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-9">
            <div class="col-md-12" >
                <h4 class="mb-3">Açiklama</h4>
                <span> {{$products->description}}</span>
                <hr>
                <div class="col-md-12">
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ürünü değerlendir
                    </button>
                </div>
            </div>

        </div>
    </div>









    <!-- Products Start -->
{{--    <div class="container-fluid py-5">--}}
{{--        <div class="text-center mb-4">--}}
{{--            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>--}}
{{--        </div>--}}
{{--        <div class="row px-xl-5">--}}
{{--            <div class="col">--}}
{{--                <div class="owl-carousel related-carousel">--}}
{{--                    <div class="card product-item border-0">--}}
{{--                        <div--}}
{{--                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">--}}
{{--                            <img class="img-fluid w-100" src="/img/product-1.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">--}}
{{--                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <h6>$123.00</h6>--}}
{{--                                <h6 class="text-muted ml-2">--}}
{{--                                    <del>$123.00</del>--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer d-flex justify-content-between bg-light border">--}}
{{--                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View--}}
{{--                                Detail</a>--}}
{{--                            <a href="" class="btn btn-sm text-dark p-0"><i--}}
{{--                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
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




<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


</body>

</html>


