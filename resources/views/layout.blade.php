<!DOCTYPE html>
<html>
<head>
    <title>Laravel Add To Cart Function </title>
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Google Web Fonts -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Customized Bootstrap Stylesheet -->
{{--    <link href="/css/style.css" rel="stylesheet">--}}
{{--    <link href="/admin/css/style.css" rel="stylesheet">--}}
    <!-- Custom css -->
{{--    <link href="/frontend/css/custom.css" rel="stylesheet">--}}

        <link href="{{ asset('frontend/css/bootstrap5.css')}}" rel="stylesheet">
{{--    <link href="{{ asset('frontend/css/custom.css')}}" rel="stylesheet">--}}
        <link href="{{ asset('frontend/css/custom3.css')}}" rel="stylesheet">
{{--        <link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}


</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid">

    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">E</span>-Ticaret</h1>
            </a>
        </div>

        <div class="col-lg-6 col-6 text-left">
            <form action="{{route('search-product')}}" method="POST">
                @csrf
                <div class="input-group" >
                    <input type="search"  class="form-control" id="search_product" name="product_name" required placeholder="Ürün Ara">
                    <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="col-lg-3 col-3 text-right" style="padding-left:350px">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                        <img height="50px" width="50px" class="img-profile rounded-circle"
                             src="/admin/img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{url('my-orders')}}">
                            <i class="bi bi-cart3"></i>
                            Siparişlerim
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-user fa-sm fa-fw mr-2 text-gray-100"></i>
                            Profilim
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            <i class="bi bi-arrow-bar-left"></i>
{{--                            {{ __('Logout') }}--}} Cikiş
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        </div>

                    </div>
                </li>
            </ul>

            {{--            <div class="container">--}}
            {{--                <li class="nav-item dropdown">--}}
            {{--                    <a class="nav-link "href="javascript:;" data-toggle="dropdown">--}}
            {{--                        <i class="meterial-icons"> kişi</i>--}}
            {{--                        <p class="d-lg-none d-md-block">Hesap </p>--}}
            {{--                    </a>--}}


            {{--                <li class="dropdown-menu dropdown-menu-right" aria-label="navbarDropdownProfile">--}}
            {{--                    <a class="dropdown-item" href="#"> Profile</a>--}}
            {{--                    <a class="dropdown-item" href="#"> settings</a>--}}
            {{--                    <div class="dropdown-divider">--}}
            {{--                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
            {{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
            {{--                               onclick="event.preventDefault();--}}
            {{--                                                     document.getElementById('logout-form').submit();">--}}
            {{--                                {{ __('Logout') }}--}}
            {{--                            </a>--}}

            {{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
            {{--                                @csrf--}}
            {{--                            </form>--}}
            {{--                        </div>--}}



            {{--                    </div>--}}

            {{--            </li>--}}
            {{--                </li>--}}

            {{--            </div>--}}

            {{--            <a href="" class="btn border">--}}
            {{--                <i class="fas fa-shopping-cart text-primary"></i>--}}
            {{--                <span class="badge">0</span>--}}
            {{--            </a>--}}
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
               data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6  style="color: whitesmoke" class="m-0">Kategoriler</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav
                class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Giyim <i
                                class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">

                                @php $a ='erkek%20giyim' ;$b ='kadın%20giyim'; $b ='kadın%20giyim';
$c ='oyuncak';
$d ='elektronik'; $e ='ev&mobilya';
$f ='ayakkabı'; $g ='aksesuar';@endphp

                            <a href="{{route('musteri-viewcat',$a)}}" class="dropdown-item">Erkek Giyim</a>
                            <a href="{{route('musteri-viewcat',$b)}}" class="dropdown-item">Kadın Giyim</a>

                        </div>
                    </div>
                    <a href="{{route('musteri-viewcat',$c)}}" class="nav-item nav-link">Oyuncak</a>
                    <a href="{{route('musteri-viewcat',$d)}}" class="nav-item nav-link">Elektronik</a>
                    <a href="{{route('musteri-viewcat',$f)}}" class="nav-item nav-link">Ayakkabı</a>
                    <a href="{{route('musteri-viewcat',$g)}}" class="nav-item nav-link">Aksesuar</a>
                    <a href="{{route('musteri-viewcat',$e)}}" class="nav-item nav-link">Ev&Mobilya</a>

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar-brand navbar-expand-lg bg-light navbar-light py-4 py-lg-0 px-0">

                <div  class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-0.5 py-3" style="width: 50px">
                        <a style="height: 50px" style="width: 100px"   href="{{url('musteri/category')}}" class="nav-item nav-link">Home</a>
                        <a href="{{route('wishlist')}}" class="nav-item nav-link ">Favorilerim
                            <span class="badge badge-pill bg-success wishlist-count"></span>
                        </a>
                    <li class="nav-item" style="height: 50px" style="width: 100px">
                        <a style="height: 50px" style="width: 100px" href="{{route('cart')}}" class="nav-link ">Sepetim
                            <span  class="badge badge-pill bg-primary cart-count"></span>
                        </a>

                    </li>



                    </div>

                </div>
            </nav>
        </div>
    </div>
</div>


<br/>
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

@yield('scripts')


{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>--}}
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>

{{--<!-- Contact Javascript File -->--}}
<script src="/mail/jqBootstrapValidation.min.js"></script>
<script src="/mail/contact.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script src="{{asset('frontend/js/checkout.js')}}"></script>
@if(session('status'))
    <script>
        swal('{{session('status')}}')
    </script>
@endif
{{--<!-- Template Javascript -->--}}
<script src="/js/main.js"></script>
<script>

    var availableTags = [];
$.ajax({
   method: "GET",
    url:"product-list",
    success:function (response){
        startAutoComplete(response);
    }
});
        function startAutoComplete(availableTags)
        {
        $( "#search_product" ).autocomplete({
            source: availableTags
        });
    }
</script>

    <script>
        $(document).ready(function () {
            loadcart();
            loadwishlist();
        })
        function loadcart(){
            $.ajax({
                method: "GET",
                url: "{{route('cart-count')}}",
                success: function (response) {
                    $('.cart-count').html('');
                    $('.cart-count ').html(response.count);
                }
            });
        }
        function  loadwishlist(){
            $.ajax({
                method: "GET",
                url: "{{route('wishlist-count')}}",
                success: function (response) {
                    $('.wishlist-count').html('');
                    $('.wishlist-count').html(response.count);
                }
            });
        }
    </script>


</body>
</html>




