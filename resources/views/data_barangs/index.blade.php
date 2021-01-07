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
        <h1 class="pull-left">Data Barang</h1>
        <h1 class="pull-right">
           <a class="btn btn-block btn-primary btn-sm" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dataBarangs.create') !!}">Tambah Data Barang</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('data_barangs.table')
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
                var oTable = $('#dataBarangs-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route("dataBarangs.index") }}'
                    },
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data: 'KODE_BARANG', name: 'KODE_BARANG'},
                        {data: 'NAMA_BARANG', name: 'NAMA_BARANG'},
                        {data: 'data_supplier.NAMA_SUPPLIER'},
                        {data: 'STOK', name: 'STOK'},
                        {data: 'SATUAN', name: 'SATUAN', orderable: false, searchable: false},
                        {data: 'HARGA_MODAL', name: 'HARGA_MODAL'},
                        {data: 'HARGA_JUAL', name: 'HARGA_JUAL'},
                        {data: 'JENIS', name: 'JENIS'},
                        {data: 'BIAYA_PEMASANGAN', name: 'BIAYA_PEMASANGAN', orderable: false},
                        {data: 'KETERANGAN', name: 'KETERANGAN'},
                        {data: 'action', name: 'dataBarangs.action', orderable: false, searchable: false}
                    ],
                    
                    scrollX : true,
                });
            });
        </script>
@endsection

