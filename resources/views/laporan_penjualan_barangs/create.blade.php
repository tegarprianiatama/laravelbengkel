@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Laporan Penjualan Barang
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'laporanPenjualanBarangs.store']) !!}

                        @include('laporan_penjualan_barangs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
