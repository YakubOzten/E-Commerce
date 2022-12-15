
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion"  id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">

            {{--                <i class="fas fa-users-gear"></i>--}}
        </div>
        <div class="sidebar-brand-text mx-3">Yönetici Paneli</div>
    </a>


    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Nav Item - Charts -->
    <div class="sidebar-wrapper">
        <li class="nav">
        <li style="color: black" class="nav-item {{ Request::is('yonetici/anasayfa')?'active':'' }}">
            <a class="nav-link " href="{{route('yonetici-anasayfa')}}">
               <span class="material-symbols-outlined">dashboard</span>


                <sp>Anasayfa</sp></a>
        </li>
        <li class="nav-item {{ Request::is('yonetici/add-product')?'active':'' }}">
            <a class="nav-link"  href="{{route('yonetici-create')}}">
             <span class="material-symbols-outlined">add_circle</span>


                <span>Ürün Ekle</span></a>
        </li>
        <li class="nav-item {{ Request::is('yonetici/add-category')?'active':'' }}">
            <a class="nav-link"  href="{{route('yonetici-c_create')}}">
                <span class="material-symbols-outlined">add_circle</span>
                <span>categori Ekle</span></a>
        </li>
        <li class="nav-item {{ Request::is('yonetici/cat-anasayfa')?'active':'' }}">
            <a class="nav-link"  href="{{route('yonetici-c_anasayfa')}}">
             <span class="material-symbols-outlined">visibility</span>


                <span>categorileri Görüntüle</span></a>
        </li>
        <li class="nav-item {{ Request::is('yonetici/orders')?'active':'' }}">
            <a class="nav-link"  href="{{url('yonetici/orders')}}">
                <span class="material-symbols-outlined">shopping_cart</span>
                       <span>Siparişler</span></a>
        </li>
        <li class="nav-item {{ Request::is('yonetici/users')?'active':'' }}">
            <a class="nav-link" href="{{route('users')}}">
                <span class="material-symbols-outlined">person</span>
                <span>Kullanıcılar</span></a>

</span>
        </li>
        </li>
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>

