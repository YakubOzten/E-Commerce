@extends('layout')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <a href="{{url('musteri/category')}}">Home</a>/
            <a href="{{route('cart')}}"> Sepet</a>

        </div>
    </div>
    <div class="container my-5">
        <div class="card-shadow ">
            @if($cartitems->count()>0)
            <div class="card-body">
                @php $total =0 ; @endphp
                @foreach($cartitems as $item)
                    <div class="row product_data" id="cart{{$item->prod_id}}">
                        <div class="col-md-2 my-auto">
                            <img src="{{asset('/storage/images/products/'.$item->products->image)}}" width="100"
                                 height="100" alt="Image here" class="img-responsive">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{$item->products->name}}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>Fiyat:{{$item->products->price}}₺</h6>
                        </div>

                        <div class="col-md-3 my-auto ">
                            <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                            @if($item->products->qty >= $item->prod_qty)
                            <label for="Quantity">Miktar</label>
                            <div class="input-group text-center mb-3" style="width: 130px">
                                <button  class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center"
                                       value="{{$item->prod_qty}}">
                                    <button  class="input-group-text changeQuantity increment-btn">+</button>
                            </div>
                                @php $total +=$item->products->price * $item->prod_qty ; @endphp
                            @else
                                <div class="alert alert-secondary" style="color:red;" role="alert">
                                    <a style="color: red" href="{{url('musteri/category')}}"> Yeterli Stok yok.</a>
                                </div>



                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart-item" onclick="deleteCart('{{route('delete_cart_item')}}','{{csrf_token()}}','{{$item->prod_id}}')"><i class="fa fa-trash"></i> Kaldır</button>
                        </div>
                    </div>

                @endforeach
            </div>

            <div class="card-footer">
                <h6>Toplam Tutar: {{$total}}₺
                <a href="{{route('checkout')}}" style="float: right" class="btn btn-outline-success float-end">Alışverişi Tamamla</a>
                </h6>
            </div>
            @else
                <div class="card-body text-center">
                  <h2>  <i class="fa fa-shopping-cart"> Sepet Boş</i></h2>
                    <a href="{{url('musteri/category')}}" class="btn btn-outline-primary float-end">Alışverişe Devam Et</a>
                </div>

            @endif
        </div>
    </div>

@endsection

{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.changeQuantity').click(function (e) {--}}
{{--                e.preventDefault();--}}
{{--                var prod_id = $(this).closest('.product_data').find('.prod_id').val();--}}
{{--                var qty = $(this).closest('.product_data').find('.qty-input').val();--}}

{{--                $.ajax({--}}
{{--                    method: "POST",--}}
{{--                    url: "{{route('update-cart')}}",--}}
{{--                    data: {--}}

{{--                        'prod_id': prod_id,--}}
{{--                        'prod_qty': qty,--}}
{{--                        "_token": "{{ csrf_token() }}",--}}
{{--                    },--}}
{{--                    success: function (response) {--}}

{{--                         window.location.reload();--}}

{{--                    },--}}

{{--                });--}}
{{--            });--}}


{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}
