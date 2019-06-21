@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Laporan Pembelian Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($laporanPembelianBarang, ['route' => ['laporanPembelianBarangs.update', $laporanPembelianBarang->id], 'method' => 'patch']) !!}

                        @include('laporan_pembelian_barangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection