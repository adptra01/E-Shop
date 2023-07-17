 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Admin Center</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::path() === 'admin' ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.dashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Pengguna
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::path() === 'administrator' ? 'active' : '' }}">
         <a class="nav-link" href="/administrator">
             <i class="fas fa-solid fa-street-view"></i>
             <span>Admin</span></a>
     </li>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::path() === 'customer' ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.customer') }}">
             <i class="fas fa-solid fa-users"></i>
             <span>Pelanggan</span></a>
     </li>

     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Produk
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::path() === 'product' ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.product') }}">
             <i class="fas fa-solid fa-cube"></i>
             <span>Produk Toko</span></a>
     </li>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::path() === 'categories' ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.categories') }}">
             <i class="fas fa-regular fa-window-restore"></i>
             <span>Kategori Produk</span></a>
     </li>

     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Sirkulasi
     </div>

     @php
         $alert1 = App\Order::where('status_order_id', [2,3,4])->count();
         $alert2 = App\Order::where('status_order_id', 2)->count();
         $alert3 = App\Order::where('status_order_id', 3)->count();
         $alert4 = App\Order::where('status_order_id', 4)->count();
         $alert5 = App\Order::where('status_order_id', 5)->count();
         $alert6 = App\Order::where('status_order_id', 6)->count();
     @endphp

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-solid fa-recycle"></i>
             <span>Transaksi @if ( $alert1 == true)
                <sup class="font-weight-bold text-warning">!</sup>
             @endif
            </span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Informasi Transaksi</h6>
                 <a class="collapse-item" href="{{ route('admin.transaksi.perludicek') }}">Perlu dicek
                @if ($alert2 == 1)
                <sup class="badge badge-danger badge-counter">{{ $alert2 }}</sup>
                @endif
                </a>
                 <a class="collapse-item" href="{{ route('admin.transaksi.perludikirim') }}">Perlu dikirim
                    @if ($alert3 == 1)
                    <sup class="badge badge-danger badge-counter">{{ $alert3 }}</sup>
                    @endif
                </a>
                 <a class="collapse-item" href="{{ route('admin.transaksi.dikirim') }}">Dalam Pengiriman
                    @if ($alert4 == 1)
                    <sup class="badge badge-danger badge-counter">{{ $alert4 }}</sup>
                    @endif
                </a>
                 <a class="collapse-item" href="{{ route('admin.transaksi.selesai') }}">Telah selesai

                </a>
                 <a class="collapse-item" href="{{ route('admin.transaksi.dibatalkan') }}">Dibatalkan</a>
                 {{-- <a class="collapse-item" href="{{ route('admin.pelanggan') }}">Informasi Pembelian</a> --}}
             </div>
         </div>
     </li>
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Pengaturan
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetri"
             aria-expanded="true" aria-controls="collapsetri">
             <i class="fas fa-fw fa-cog"></i>
             <span>Tentang Toko</span>
         </a>
         <div id="collapsetri" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Toko</h6>
                 <a class="collapse-item" href="{{ route('admin.rekening') }}">No. Rekening</a>
                 <a class="collapse-item" href="{{ route('admin.pengaturan.alamat') }}">Informasi toko</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::path() === 'laporan' ? 'active' : '' }}">
         <a class="nav-link" href="/admin/laporan">
             <i class="fas fa-fw fa-file"></i>
             <span>Laporan Penjualan</span></a>
     </li>

     <li class="nav-item {{ Request::path() === 'admin/contact' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contact') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Bantuan</span></a>
    </li>

     <hr class="sidebar-divider d-none d-md-block">
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->
