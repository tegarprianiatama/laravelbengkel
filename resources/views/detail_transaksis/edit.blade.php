@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Transaksi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailTransaksi, ['route' => ['detailTransaksis.update', $detailTransaksi->ID_DETAIL_JASA_SERVIS], 'method' => 'patch']) !!}

                        @include('detail_transaksis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection