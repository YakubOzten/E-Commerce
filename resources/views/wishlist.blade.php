@extends('layout')
{{--style="border: 64px solid #669999"--}}
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('musteri/category')}}">Home</a>/
                <a href="{{route('wishlist')}}"> Favorilerim</a>
            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card-shadow ">
            <div class="card-body">
                @if($wishlist->count() >0)
                    <div class="card-body">
                        @foreach($wishlist as $item)
                            <div class="row product_data" id="cart{{$item->prod_id}}">
                                <div class="col-md-2 my-auto">
                                    <img src="{{asset('/storage/images/products/'.$item->products->image)}}" width="100"
                                         height="100" alt="Image here" class="img-responsive">
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6>{{$item->products->name}}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6>Fiyat:{{$item->products->price}}₺</h6>
                                </div>

                                <div class="col-md-2 my-auto ">
                                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                    @if($item->products->qty >= $item->prod_qty)
                                        <h6>Stok Durumu:Mevcut</h6>
                                        <label for="Quantity">Adet</label>
                                        <div class="input-group text-center mb-3" style="width: 130px">
                                            <button class="input-group-text  decrement-btn">-</button>
                                            <input type="text" name="quantity"
                                                   class="form-control qty-input text-center"
                                                   value="1">
                                            <button class="input-group-text  increment-btn">+</button>
                                        </div>
                                    @else
                                        <div class="alert alert-secondary" style="color:red;" role="alert">
                                            <a style="color: red"> Yeterli Stok yok</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"></i>
                                        Sepete Ekle
                                    </button>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i> Sil
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">

                    </div>
                @else
                    <h4> Favorilerimde bir ürün yok</h4>
                @endif
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
            $('.remove-wishlist-item').click(function (e) {
                e.preventDefault();
                var prod_id = $(this).closest('.product_data').find('.prod_id').val();

                $.ajax({
                    method: "POST",
                    url: "{{route('delete-wishlist')}}",
                    data: {
                        'prod_id': prod_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        window.location.reload();
                        swal("", response.status, "success");
                    }

                });
            });
        })
    </script>
@endsection





