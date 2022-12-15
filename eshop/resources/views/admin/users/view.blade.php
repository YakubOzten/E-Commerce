@extends("/layouts/admin")
@section("sidebar")
    @include("/admin/sidebar")
@endsection
@section("content")

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Kullanıcı Detay Ekranı
             <a  style="float: right" href="{{url('yonetici/users')}}" class="btn btn-warning float-end">Geri Dön</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Rolü</label>
                            <div class="p-2 border">{{$users->role_as=='0'?'User':'Admin'}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">İsim</label>
                            <div class="p-2 border">{{$users->name}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Soyisim</label>
                            <div class="p-2 border">{{$users->lastname}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{$users->email}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Telefon</label>
                            <div class="p-2 border">{{$users->phone}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Adres1</label>
                            <div class="p-2 border">{{$users->adress1}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Adres2</label>
                            <div class="p-2 border">{{$users->adress2}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Şehir</label>
                            <div class="p-2 border">{{$users->city}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">İlce</label>
                            <div class="p-2 border">{{$users->state}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Ülke</label>
                            <div class="p-2 border">{{$users->country}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Posta Kodu</label>
                            <div class="p-2 border">{{$users->postcode}}</div>
                        </div>


                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
