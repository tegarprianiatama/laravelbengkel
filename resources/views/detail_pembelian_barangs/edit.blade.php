@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Pembelian Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailPembelianBarang, ['route' => ['detailPembelianBarangs.update', $detailPembelianBarang->ID_DETAIL_PEMBELIAN_BARANG], 'method' => 'patch']) !!}

                        @include('detail_pembelian_barangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection