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


});


