@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail  Penjualan  Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailPenjualanBarang, ['route' => ['detailPenjualanBarangs.update', $detailPenjualanBarang->ID_PENJUALAN_BARANG], 'method' => 'patch']) !!}

                        @include('detail__penjualan__barangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection