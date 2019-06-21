@extends('layouts.app')

@section('content')
<div class="box box-success">
    <section class="box-header">
                    <h1>
                    </h1>
    </section>
<section class="content">
<div class="site-index">

<div class="col-lg-13">
        <div class="info-box">
            <div class="small-box bg-green">
                <div class="inner">
                    <font size="6.8"> <b>Aplikasi Pengelolaan Bengkel Kembang Jepun Motor</b></font>
                        <div class="icon">
                              <i class="fa fa-motorcycle"></i>
                        </div>  
                 </div>
                 <font size="4"> &nbsp; &nbsp; &nbsp;Jl. Pahlawan No.326, Dusun Gempolan, Ketanon, Kedungwaru, Kabupaten Tulungagung, Jawa Timur 66229 </font><br> <br>
                 <marquee height="40"  scrollamount="7"><font size="4">Anda Sedang Mengakses Aplikasi Pengelolaan Bengkel Kembang Jepun Motor !&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</font></marquee>
             </div>
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
                    {{-- <li>Input Update dan Delete Data Kasir</li> --}}
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
                    {{-- <li>Melihat Laporan Harian</li> --}}
                    <br>
                    <br>

                                </ul>          
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
