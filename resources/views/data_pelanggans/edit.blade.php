@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Pelanggan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataPelanggan, ['route' => ['dataPelanggans.update', $dataPelanggan->ID_PELANGGAN], 'method' => 'patch']) !!}

                        @include('data_pelanggans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection