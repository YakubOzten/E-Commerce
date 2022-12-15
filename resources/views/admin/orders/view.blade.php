@extends("/layouts/admin")
@section("sidebar")
    @include("/admin/sidebar")
@endsection
@section("content")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Sipariş ekranı
                            <a style="float: right" href="{{url('yonetici/orders')}}"
                               class="btn btn-warning text-white float-end">Geri</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4 style="color: black">Alışveriş bilgileri</h4>
                                <label for="">Ad</label>
                                <div class="border ">{{$orders->firstname}}</div>
                                <label for="">Soyad</label>
                                <div class="border ">{{$orders->lastname}}</div>
                                <label for="">email</label>
                                <div class="border ">{{$orders->email}}</div>
                                <label for="">iletişim no:</label>
                                <div class="border ">{{$orders->phone}}</div>
                                <label for="">Shopping Address</label>
                                <div class="border ">
                                    {{$orders->adress1}},
                                    {{$orders->adress2}},
                                    {{$orders->city}},
                                    {{$orders->state}},
                                    {{$orders->country}},
                                </div>
                                <label for="">Posta codu:</label>
                                <div class="border p-2">{{$orders->postcode}}</div>


                            </div>
                            <div class="col-md-6">
                                <h4 style="color: black">Sipariş Bilgileri</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>İsim</th>
                                        <th>Adet</th>
                                        <th>Fiyat</th>
                                        <th>İmage</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderitems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                <img
                                                    src="{{asset('/storage/images/products/'.$item->products->image)}}"
                                                    width="50px" alt="Product İmage">
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <h4 class="px-2">Toplam Tutar: <span style="float: right"
                                                                     class="float-end">{{$orders->total_price}}</span>
                                </h4>
                                    <div class="mt-5 px-2">
                                 <label for="exampleFormControlSelect1" >Sipariş Bilgisi</label>
                                        <form action="{{route('update',$orders->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                    <select class="form-control" name="order_status" id="exampleFormControlSelect1">

                                        <option {{$orders->status == '0' ? 'selected':''}}value="0">Bekliyor</option>
                                        <option {{$orders->status == '1' ? 'selected':''}}value="1">Tamamlandı</option>

                                    </select>
                                        <button style="float: right" type="submit" class="btn btn-primary float-end mt-3 ">Güncelle</button>
                                        </form>
                                    </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
