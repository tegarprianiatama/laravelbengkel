@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Motor Pelanggan</h1>
        <h1 class="pull-right">
           <a class="btn btn-block btn-primary btn-sm" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dataMotorPelanggans.create', request()->segment(2)) !!}">Tambah Data Motor Pelanggan</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('data_motor_pelanggans.table')
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
                var oTable = $('#dataMotorPelanggans-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route("dataMotorPelanggans.index", request()->segment(2)) }}'
                    },
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data: 'data_pelanggan.NAMA'},
                        {data: 'NAMA', name: 'NAMA'},
                        {data: 'NO_POL', name: 'NO_POL'},
                        {data: 'ISI_SILIDER', name: 'ISI_SILIDER', orderable: false, searchable: false},
                        {data: 'kategori_motor.NAMA'},
                        {data: 'action', name: 'murids.action', orderable: false, searchable: false}
                    ],
                    initComplete: function () {
                        this.api().columns().every(function () {
                            var column = this;
                            var input = document.createElement("input");
                            $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                        });
                    },
                    scrollX : true,
                });
            });
        </script>
@endsection
