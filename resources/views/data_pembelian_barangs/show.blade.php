@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Pembelian Barang
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('data_pembelian_barangs.show_fields')
                    <a href="{!! route('dataPembelianBarangs.print', ['id' => $dataPembelianBarang-> ID_DATA_PEMBELIAN_BARANG]) !!}" target="_blank" class="btn btn-success"> <i class="fa fa-print"></i> Print</a>
                    <a href="{!! route('dataPembelianBarangs.index') !!}" class="btn btn-default">Kembali</a>
                    <a href="{!! route('dataPembelianBarangs.create') !!}" class="btn btn-primary"> <i class="fa fa-edit"></i> Buat Baru</a>
                </div>
            </div>
        </div>
    </div>
@endsection
