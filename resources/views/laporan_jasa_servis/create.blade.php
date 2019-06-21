@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Laporan Jasa Servis
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'laporanJasaServis.store']) !!}

                        @include('laporan_jasa_servis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#MULAI_TANGGAL').datepicker({
                autoclose : true,
                format: 'dd/mm/yyyy'
        });
    }
    $(document).ready(function() {
        $('#SAMPAI_TANGGAL').datepicker({
                autoclose : true,
                format: 'dd/mm/yyyy'
        });
    }
</script>
@endsection
