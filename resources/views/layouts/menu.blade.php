<section class="sidebar">

<ul class="sidebar-menu" data-widget="tree">
        <li class="header">Beranda</li>
        {{-- <li><a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Dashboard</span></a></li> --}}
        <li><a href="{!! url('/') !!}"><i class="fa fa fa-home"></i><span>Home</span></a></li>

{{--      <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
    </li> --}}      

{{-- Admin --}}
@if(auth()->user()->role->guard_name == 'admin')
<li class="{{ Request::is('dataKasirs*') ? 'active' : '' }}">
    <a href="{!! route('dataKasirs.index') !!}"><i class="fa fa-address-card-o"></i><span>Kasir</span></a>
</li>
@endif

<li class="{{ Request::is('dataPelanggans*') ? 'active' : '' }}">
    <a href="{!! route('dataPelanggans.index') !!}"><i class="fa fa-address-book-o"></i><span>Pelanggan</span></a>
</li>

</section><li class="{{ Request::is('kategoriMotors*') ? 'active' : '' }}">
    <a href="{!! route('kategoriMotors.index') !!}"><i class="fa fa-list-alt"></i><span>Kategori Motor</span></a>
</li>

<li class="{{ Request::is('dataJasaServis*') ? 'active' : '' }}">
    <a href="{!! route('dataJasaServis.index') !!}"><i class="fa fa-cog"></i><span>Jasa Servis</span></a>
</li>

@if(auth()->user()->role->guard_name == 'admin')
<li class="{{ Request::is('dataMekaniks*') ? 'active' : '' }}">
    <a href="{!! route('dataMekaniks.index') !!}"><i class="fa fa-cogs"></i><span>Mekanik</span></a>
</li>
@endif

<li class="{{ Request::is('dataBarangs*') ? 'active' : '' }}">
    <a href="{!! route('dataBarangs.index') !!}"><i class="fa fa-product-hunt"></i><span>Barang</span></a>
</li>

@if(auth()->user()->role->guard_name == 'admin')
<li class="{{ Request::is('dataSuppliers*') ? 'active' : '' }}">
    <a href="{!! route('dataSuppliers.index') !!}"><i class="fa fa-cart-plus"></i><span>Supplier</span></a>
</li>
@endif

<ul class="sidebar-menu" data-widget="tree">
        <li class="header">Transaksi</li>
        {{-- <li><a href="{!! route('dataTransaksis.index') !!}"><i class="fa fa-fax"></i><span>Transaksi Servis</span></a></li> --}}

<li class="{{ Request::is('dataTransaksis*') ? 'active' : '' }}">
    <a href="{!! route('dataTransaksis.index') !!}"><i class="fa fa-fax"></i><span>Transaksi Servis</span></a>
</li>

{{-- @if(auth()->user()->role->guard_name == 'admin')
<li class="{{ Request::is('detailTransaksis*') ? 'active' : '' }}">
    <a href="{!! route('detailTransaksis.index') !!}"><i class="fa fa-fax"></i><span>Detail Transaksi Servis</span></a>
</li>
@endif --}}

@if(auth()->user()->role->guard_name == 'admin')
<li class="{{ Request::is('dataPembelianBarangs*') ? 'active' : '' }}">
    <a href="{!! route('dataPembelianBarangs.index') !!}"><i class="fa fa-shopping-cart"></i><span>Pembelian Barang</span></a>
</li>
@endif

{{-- @if(auth()->user()->role->guard_name == 'admin')
<li class="{{ Request::is('detailPembelianBarangs*') ? 'active' : '' }}">
    <a href="{!! route('detailPembelianBarangs.index') !!}"><i class="fa fa-shopping-cart"></i><span>Detail Pembelian Barang</span></a>
</li>
@endif --}}

<li class="{{ Request::is('dataPenjualanBarangs*') ? 'active' : '' }}">
    <a href="{!! route('dataPenjualanBarangs.index') !!}"><i class="fa fa-cart-arrow-down"></i><span>Penjualan Barang</span></a>
</li>

{{-- @if(auth()->user()->role->guard_name == 'admin')
<li class="{{ Request::is('detailPenjualanBarangs*') ? 'active' : '' }}">
    <a href="{!! route('detailPenjualanBarangs.index') !!}"><i class="fa fa-cart-arrow-down"></i><span>Detail Penjualan Barang</span></a>
</li>
@endif --}}

@if(auth()->user()->role->guard_name == 'admin')
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">Laporan</li>
      {{--   <li><a href="{!! route('dataTransaksis.index') !!}"><i class="fa fa-fax"></i><span>Transaksi Servis</span></a></li> --}}

<li class="{{ Request::is('laporanPenjualanBarangs*') ? 'active' : '' }}">
    <a href="{!! route('laporanPenjualanBarangs.index') !!}"><i class="fa fa-clipboard"></i><span>Laporan Penjualan Barang</span></a>
</li>

<li class="{{ Request::is('laporanPembelianBarangs*') ? 'active' : '' }}">
    <a href="{!! route('laporanPembelianBarangs.index') !!}"><i class="fa fa-clipboard"></i><span>Laporan Pembelian Barang</span></a>
</li>

<li class="{{ Request::is('laporanJasaServis*') ? 'active' : '' }}">
    <a href="{!! route('laporanJasaServis.index') !!}"><i class="fa fa-clipboard"></i><span>Laporan Jasa Servis</span></a>
</li>
@endif

{{-- @if(auth()->user()->role->guard_name == 'admin')
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">Manajemen User</li>

<li class="{{ Request::is('Roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-user"></i><span>Role</span></a>
</li>
@endif --}}

