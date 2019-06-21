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
                   {!! Form::model($laporanJasaServis, ['route' => ['laporanJasaServis.update', $laporanJasaServis->id], 'method' => 'patch']) !!}

                        @include('laporan_jasa_servis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection