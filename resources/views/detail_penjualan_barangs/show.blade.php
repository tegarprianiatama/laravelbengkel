@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail  Penjualan  Barang
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('detail_penjualan_barangs.show_fields')
                    <a href="{!! route('detailPenjualanBarangs.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
