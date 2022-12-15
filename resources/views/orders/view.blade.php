@extends('layout')



@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Sipariş ekranı
                          <a  style="float: right" href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Geri</a>
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
                                    <h4 class="px-2">Toplam Tutar: <span style="float: right" class="float-end">{{$orders->total_price}}</span></h4>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
