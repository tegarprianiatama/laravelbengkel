@extends('layouts.app')
@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Pelanggan</h1>
        <h1 class="pull-right">
           <a class="btn btn-block btn-primary btn-sm" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dataPelanggans.create') !!}">Tambah Pelanggan</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('data_pelanggans.table')
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
                var oTable = $('#dataPelanggans-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route("dataPelanggans.index") }}'
                    },
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data: 'NAMA', name: 'NAMA'},
                        {data: 'ALAMAT', name: 'ALAMAT'},
                        {data: 'NO_TELP', name: 'NO_TELP', orderable: false, searchable: false},
                        {data: 'action', name: 'dataPelanggans.action', orderable: false, searchable: false}
                    ],
                    scrollX : true,
                });
            });
        </script>
@endsection
