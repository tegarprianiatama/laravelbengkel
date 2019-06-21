@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Penjualan Barang
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('data_penjualan_barangs.show_fields')
                    <a href="{!! route('dataPenjualanBarangs.print', ['id' => $dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN]) !!}" target="_blank" class="btn btn-success"> <i class="fa fa-print"></i> Print</a>
                    {{-- <a href="{!! route('dataPenjualanBarangs.printnota', ['id' => $dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN]) !!}" class="btn btn-warning"> <i class="fa fa-print"></i> Print Struk</a> --}}
                    <br>
                    <br>
                    <a href="{!! route('dataPenjualanBarangs.index') !!}" class="btn btn-default">Kembali</a>
                    <a href="{!! route('dataPenjualanBarangs.create') !!}" class="btn btn-primary"> <i class="fa fa-edit"></i> Buat Baru</a>
                </div>
                {{-- <div class="row" style="padding-left: 20px">
                    @include('data_penjualan_barangs.show_fields')
                    <a href="{!! route('dataPenjualanBarangs.index') !!}" class="btn btn-default">Back</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
