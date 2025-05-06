<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{ asset('template-admin/src/assets/images/logos/dark-logo.svg')}}" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          @if (Auth::user()->level == 'Admin')              

          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item {{ request()->is('dashboard*') ? 'selected' : '' }}">
            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Data Master</span>
          </li>
          <li class="sidebar-item {{ request()->is('pengguna*') ? 'selected' : '' }}">
            <a class="sidebar-link" href="{{ route('pengguna.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-user-plus"></i>
              </span>
              <span class="hide-menu">Pengguna</span>
            </a>
          </li>
          <li class="sidebar-item {{ request()->is('paket*') ? 'selected' : '' }}">
            <a class="sidebar-link" href="{{ route('paket.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">Paket</span>
            </a>
          </li>

          @endif
          
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">TRANSAKSI</span>
          </li>
          <li class="sidebar-item {{ request()->is('pesanan*') ? 'selected' : '' }}">
            <a class="sidebar-link" href="{{ route('pesanan.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-article"></i>
              </span>
              <span class="hide-menu">Pesanan</span>
            </a>
          </li>
          <li class="sidebar-item {{ request()->is('laporan*') ? 'selected' : '' }}">
            <a class="sidebar-link" href="{{ route('laporan.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-file"></i>
              </span>
              <span class="hide-menu">Laporan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->