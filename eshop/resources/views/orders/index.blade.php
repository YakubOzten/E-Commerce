@extends('layout')



@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Benim Siparişlerim</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Sipariş Zamanı</th>
                                <th>Takip no</th>
                                <th>Toplam Fiyat</th>
                                <th>Durum</th>
                                <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->status=='0' ? 'Bekliyor' : 'Tamamlandı'}}</td>

                                    <td><a href="{{url('view-orders/'.$item->id)}}" class="btn btn-primary">incele</a></td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
