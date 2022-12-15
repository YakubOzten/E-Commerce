@extends('layout')
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Eticaret - YKBOZ</title>

    <!--Google font-->
    <link href="../css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="../../css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body class="theme-color-1">

@section("content")

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <a class="" href=" {{url('musteri/category')}}">Home</a> /
            <a class="" href="">CheckOut </a>

        </div>
    </div>

    <div class="container">
        <form action="{{route('place-orders')}}" method="POST">
            @csrf
            <div class="checkout-page">
                <div class="checkout-form">

                    <div class="row">
                        {{--                        Biling Deatils--}}
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Fatura Detayları</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div  class="field-label">İsim</div>
                                    <input  required class="firstname" type="text" name="firstname" value="{{Auth::user()->name}}" placeholder="">
                                    <span id="firstname_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Soy İsim</div>
                                    <input required class="lastname" type="text" name="lastname" value="{{Auth::user()->lastname}}"
                                           placeholder="">
                                    <span id="lastname_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">telefon no</div>
                                    <input  required class="phone" type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="">
                                    <span id="phone_error" class="text-danger"> </span>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email adresi</div>
                                    <input  required class="email" type="text" name="email" value="{{Auth::user()->email}}" placeholder="">
                                    <span id="email_error"class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">ülke</div>
                                    <input required class="country" type="text" name="country" value="{{Auth::user()->country}}" placeholder="">
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">adres 1</div>
                                    <input required class="adress1"  type="text" name="adress1" value="{{Auth::user()->adress1}}"
                                           placeholder="Street address">
                                    <span id="adress1_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">adres 2</div>
                                    <input required class="adress2"  type="text" name="adress2" value="{{Auth::user()->adress2}}"
                                           placeholder="Street address">
                                    <span id="adress2_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">şehir</div>
                                    <input required class="city"  type="text" name="city" value="{{Auth::user()->city}}" placeholder="">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">ilçe</div>
                                    <input required class="state"  type="text" name="state" value="{{Auth::user()->state}}" placeholder="">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">posta kodu</div>
                                    <input  required class="postcode" type="text" name="postcode" value="{{Auth::user()->postcode}}"
                                           placeholder="">
                                    <span id="postcode_error"class="text-danger"></span>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
                            </div>
                        </div>
                        {{--                        Checkout Details--}}
                        @php $total =0 ; @endphp
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>isim</th>
                                                <th>miktar</th>
                                                <th>fiyat</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cartitems as $item)

                                                <tr>
                                                    @php $total += $item->products->price * $item->prod_qty; @endphp
                                                    <td>{{$item->products->name}} </td>
                                                    <td>{{$item->prod_qty}} </td>
                                                    <td>{{$item->products->price}}₺ </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
{{--                                            <h4 class="px-2">Toplam Tutar: <span style="float: right"--}}
{{--                                                                                 class="float-end">{{$orders->total_price}}</span>--}}
{{--                                            </h4>--}}
                                        </table>
                                        <h4   class="px-2"> Toplam Tutar <span> <strong style="float:right" class="float-right " >{{$total}}₺</strong></span></h4>
                                        </hr>
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <button type="submit" class="btn btn-success w-100">
                                            Sipariş ver |Kapıda Ödeme </button>

                                        <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn" > Razorpay ile ödeme
                                        </button>

                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection



<!-- latest jquery-->
<script src="../assets/js/jquery-3.3.1.min.js"></script>

<!-- menu js-->
<script src="../assets/js/menu.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!-- slick js-->
<script src="../assets/js/slick.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Notification js-->
<script src="../assets/js/bootstrap-notify.min.js"></script>

<!-- Theme js-->
<script src="../assets/js/theme-setting.js"></script>
<script src="../assets/js/script.js"></script>

<script>
    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
</script>
</body>
</html>

@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.razorpay_btn').click(function (e) {
                e.preventDefault();

                var firstname = $('.firstname').val();
                var lastname = $('.lastname').val();
                var phone = $('.phone').val();
                var email = $('.email').val();
                var country = $('.country').val();
                var adress1 = $('.adress1').val();
                var adress2 = $('.adress2').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var postcode = $('.postcode').val();

                if (!firstname) {
                    firstname_error = "Ad kısmını lütfen doldurun";
                    $('#firstname_error').html('');
                    $('#firstname_error').html(firstname_error);

                } else {
                    firstname_error = "";
                    $('#firstname_error').html('');

                }
                if (!lastname) {
                    lastname_error = "Soyad kısmını lütfen doldurun";
                    $('#lastname_error').html('');
                    $('#lastname_error').html(lastname_error);

                } else {
                    lastname_error = "";
                    $('#lastname_error').html('');

                }

                if (!phone) {
                    phone_error = "telefon kısmını lütfen doldurun";
                    $('#phone_error').html('');
                    $('#phone_error').html(phone_error);

                } else {
                    phone_error = "";
                    $('#phone_error').html('');

                }

                if (!email) {
                    email_error = "email kısmını lütfen doldurun";
                    $('#email_error').html('');
                    $('#email_error').html(email_error);

                } else {
                    email_error = "";
                    $('#email_error').html('');

                }
                if (!country) {
                    country_error = "Ülke kısmını lütfen doldurun";
                    $('#country_error').html('');
                    $('#country_error').html(country_error);

                } else {
                    country_error = "";
                    $('#country_error').html('');

                }
                if (!adress1) {
                    adress1_error = "adress1 kısmını lütfen doldurun";
                    $('#adress1_error').html('');
                    $('#adress1_error').html(adress1_error);

                } else {
                    adress1_error = "";
                    $('#adress1_error').html('');

                }

                if (!adress2) {
                    adress2_error = "Adress2 kısmını lütfen doldurun";
                    $('#adress2_error').html('');
                    $('#adress2_error').html(adress2_error);

                } else {
                    adress2_error = "";
                    $('#adress2_error').html('');

                }


                if (!city) {
                    city_error = "İl kısmını lütfen doldurun";
                    $('#city_error').html('');
                    $('#city_error').html(city_error);

                } else {
                    city_error = "";
                    $('#city_error').html('');

                }
                if (!state) {
                    state_error = "İlce kısmını lütfen doldurun";
                    $('#state_error').html('');
                    $('#state_error').html(state_error);

                } else {
                    state_error = "";
                    $('#state_error').html('');

                }


                if (!postcode) {
                    postcode_error = "Posta kodu kısmını lütfen doldurun";
                    $('#postcode_error').html('');
                    $('#postcode_error').html(postcode_error);

                } else {
                    postcode_error = "";
                    $('#postcode_error').html('');

                }

                if (firstname_error != '' || lastname_error != '' || phone_error != '' || adress1_error != '' ||
                    adress2_error != '' || country_error != '' || state_error != '' || postcode_error != '' || city_error != '') {

                    return false;
                } else {
                    var data = {
                        'firstname': firstname,
                        'lastname': lastname,
                        'phone': phone,
                        'email': email,
                        'country': country,
                        'adress1': adress1,
                        'adress2': adress2,
                        'city': city,
                        'state': state,
                        'postcode': postcode,
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: "/proceed-to-pay",
                        data: data,
                        success: function (response) {
                            var options = {
                                "key": "rzp_test_gtZL6HPvXgbxI4", // Enter the Key ID generated from the Dashboard
                                "amount": response.total_price * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                "currency": "INR",
                                "name": response.firstname + ' ' + response.lastname,
                                "description": "Bizi Seçtiğiniz için Teşekkür ederiz.",
                                "image": "https://example.com/your_logo",
                                // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                "handler": function (responsea) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        method: 'POST',
                                        url: "/place-order",
                                        data: {
                                            'firstname': response.firstname,
                                            'lastname': response.lastname,
                                            'email': response.email,
                                            'phone': response.phone,
                                            'country': response.country,
                                            'adress1': response.adress1,
                                            'adress2': response.adress2,
                                            'city': response.city,
                                            'state': response.state,
                                            'postcode': response.postcode,
                                            'payment_mode': 'Paid by Razorpay',
                                            'payment_id': responsea.razorpay_payment_id,
                                        },
                                        success: function (responseb) {
                                            swal(responseb.status);
                                            window.location.href ="/musteri/category"

                                        },
                                        error: function (responserror) {
                                            alert(responserror);
                                        }


                                    });
                                },
                                "prefill": {
                                    "name": response.firstname + ' ' + response.lastname,
                                    "email": response.email,
                                    "contact": response.phone
                                },

                                "theme": {
                                    "color": "#3399cc"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.open();

                        }

                    });

                }


            });


        })
    </script>
@endsection

