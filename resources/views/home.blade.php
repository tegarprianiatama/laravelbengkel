@extends('layouts.app')

@section('content')
<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $jmlBrg }}</h3>

              <p>Barang Hampir Habis</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('dataBarangs.index') }}" class="small-box-footer">Lihat Lebih Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    <div>
        <div class="col-lg-13">
            <div class="info-box">
                <div class="small-box bg-green">
                    <div class="inner">
                    <font size="6"> <b>Aplikasi Pengelolaan Bengkel Kembang Jepun Motor</b></font>
                        <div class="icon">
                                <i class="fa fa-motorcycle"></i>
                        </div>  
                    </div>
                    <font size="4"> &nbsp; Jl. Pahlawan No.326, Dusun Gempolan, Ketanon, Kedungwaru, Kabupaten Tulungagung, Jawa Timur 66229 </font><br> <br>
                </div>
            </div>
        </div>
        <div class="body-content">        
            <div class="row">
                <div class="col-lg-6">
                    <div class="info-box">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>Admin</h3>
                                <h4>(Pemilik Bengkel Kembang Jepun Motor)</h4>
                                <li>Input dan Update Data Kasir</li>
                                <li>Input dan Update Data Pelanggan</li>
                                <li>Input dan Update Data Motor Pelanggan</li>
                                <li>Input dan Update Data Jasa Servis</li>
                                <li>Input dan Update Data Mekanik</li>
                                <li>Input dan Update Data Barang</li>
                                <li>Input dan Update Data Supplier</li>
                                <li>Input dan Delete  Transaksi Servis dari Pelanggan</li>
                                <li>Melihat dan Delete Detail Transaksi Servis dari Pelanggan</li>
                                <li>Input dan Delete Transaksi Pembelian Barang dari Supplier</li>
                                <li>Melihat dan Delete Transaksi Pembelian Barang dari Supplier</li>
                                <li>Input dan Delete Transaksi Penjualan Barang dari Pelanggan</li>
                                <li>Melihat dan Delete Transaksi Penjualan Barang dari Pelanggan</li>
                                <li>Melihat Laporan Transaksi Servis</li>
                                <li>Melihat Laporan Pembelian Barang</li>
                                <li>Melihat Laporan Penjualan Barang</li>
                                <div class="icon">
                                    <i class="fa fa-gears">A</i>
                                </div>  
                            </div>
                            <ul>
                            <br>
                            <br>
                            </ul>
                        </div>
                    </div>
                </div>            
                <div class="col-lg-6">
                    <div class="info-box">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>User</h3>
                                <h4>(Pegawai Atau Kasir Bengkel Kembang Jepun Motor)</h4>
                                <li>Input Data Pelanggan</li>
                                <li>Input Data Motor Pelanggan</li>
                                <li>Melihat Data Jasa Servis</li>
                                <li>Melihat dan Mencari Data Barang</li>
                                <li>Input Transaksi Servis dari Pelanggan</li>
                                <li>Input Transaksi Penjualan Barang dari Pelanggan</li>
                                <div class="icon">
                                    <i class="fa fa-gears">U</i>
                                </div>  
                            </div>
                            <ul>
                            <br>
                            <br>
                            </ul>          
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
@endsection
