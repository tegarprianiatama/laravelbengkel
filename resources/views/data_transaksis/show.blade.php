@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Transaksi
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('data_transaksis.show_fields')
                    <a href="{!! route('dataTransaksis.print', ['id' => $dataTransaksi->ID_DATA_TRANSAKSI]) !!}" target="_blank" class="btn btn-success"> <i class="fa fa-print"></i> Print</a>
                    <a href="{!! route('dataTransaksis.index') !!}" class="btn btn-default">Kembali</a>
                    <a href="{!! route('dataTransaksis.create') !!}" class="btn btn-primary"> <i class="fa fa-edit"></i>Transaksi Baru</a>
                </div>
            </div>
        </div>
    </div>
@endsection
