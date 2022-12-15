$(document).ready(function () {
    loadcart();
    // $('.addToCartBtn').click(function (e) {
    //     e.preventDefault();
    //
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     var product_id = $(this).closest('.product_data').find('.prod_id').val();
    //     var product_qty = $(this).closest('.product_data').find('.qty-input').val();
    //
    //     $.ajax({
    //         method: "POST",
    //         url: "musteri/add-to-cart",
    //         data: {
    //
    //             'product_id': product_id,
    //             'product_qty': product_qty,
    //
    //         },
    //         success: function (response) {
    //             alert(response);
    //         }
    //
    //     });
    // });
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
    $('.decrement-btn').click(function (e) {

        e.preventDefault();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
    $('.changeQuantity').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
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


        },
        success: function (response) {
            swal(response.status);
        }

    });


});
function loadcart(){

    $.ajax({

        method: "GET",
        url: "/load-card-data",
        success: function (response) {
            $('.cart-count').html('');
            $('.cart-count').html(response.count);

            }

    });


}



function deleteCart(url,token,id) {
    $.ajax({
        method: "POST",
        url: url,
        data: {
            'prod_id': id,
            "_token": token,
        },
        success: function (response) {
            $('#cart'+id).remove();
            window.location.reload();
            swal("", response.status, "success");
        }

    });
}

