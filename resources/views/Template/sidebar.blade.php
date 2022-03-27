<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('assets')}}/index3.html" class="brand-link">
      <img src="{{asset('assets')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <a href="profil">
          <form action="{{route('logout')}}" method="post">

            <div class="image">

          <img src="{{asset('assets')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">


        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->nama}}</a>
        </div>
        <button class="btn-danger" type="submit">Logout</button>
        @csrf
    </form>
        </a>

      </div>



      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->)
          <li class="nav-header">FORMS</li>
            <li class="nav-item">
                <a href="/member" class="nav-link" {{ auth()->user()->role == 'owner' ? 'hidden' : '' }}>
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Member</p>
                </a>
            </li>
            <li class="nav-item" {{ auth()->user()->role != 'admin' ? 'hidden' : '' }}>
                <a href="/users" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item" {{ auth()->user()->role != 'admin' ? 'hidden' : '' }}>
                <a href="/paket" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Paket</p>
                </a>
            </li>
            <li class="nav-item" {{ auth()->user()->role != 'admin' ? 'hidden' : '' }}>
                <a href="/outlet" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Outlet</p>
                </a>
            </li>
        </li>
          <li class="nav-header">TRANSAKSI
            <li class="nav-item">
                <a href="/transaksi2" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Transaksi Jasa</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="laravel" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Laporan</p>
                </a>
            </li>
        </li>
        <li class="nav-header">Simulasi
            <li class="nav-item">
                <a href="/simulasi-1" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Simulasi 1</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/simulasi-2" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Simulasi 2</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/gaji" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Gaji Karyawan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/penjemputan" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Penjemputan Laundry</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/Tbarang" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Simulasi Transaksi</p>
                </a>
            </li>
        </li>
          {{-- <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li> --}}

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
