@extends('layouts.app')
@section('css')
    @include('layouts.datatables_css')
@endsection

@section('css')
    <style type="text/css">
        table tfoot {
            display: table-header-group;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Transaksi Servis</h1>
        <h1 class="pull-right">
           <a class="btn btn-block btn-primary btn-sm" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dataTransaksis.create') !!}">Tambah Data Transaksi</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('data_transaksis.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
@section('scripts')
    @include('layouts.datatables_js_client')
        <script type="text/javascript">
            $(function() {
                var oTable = $('#dataTransaksis-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route("dataTransaksis.index") }}'
                    },
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data: 'data_pelanggan.NAMA'},
                        {data: 'data_kasir.NAMA_KASIR'},
                        {data: 'data_mekanik.NAMA_MEKANIK'},
                        {data: 'data_motor_pelanggan.NAMA'},
                        {data: 'NAMA_JASA'},
                        {data: 'TGL_PENJUALAN'},
                        {data: 'KETERANGAN', name: 'KETERANGAN'},
                        {data: 'BIAYA_TAMBAHAN', name: 'BIAYA_TAMBAHAN', orderable: false},
                        {data: 'TOTAL_DISKON', name: 'TOTAL_DISKON'},
                        {data: 'TOTAL', name: 'TOTAL'},
                        {data: 'action', name: 'dataTransaksis.action', orderable: false, searchable: false}
                    ],
                    scrollX : true,
                });
            });
        </script>
@endsection

