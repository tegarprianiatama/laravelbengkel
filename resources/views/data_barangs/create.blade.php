@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Barang
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'dataBarangs.store']) !!}

                        @include('data_barangs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.select-supplier').select2({
            theme: "bootstrap",
        });
    });
</script>
@endsection
