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
                   {!! Form::model($dataBarang, ['route' => ['dataBarangs.update', $dataBarang->ID_BARANG], 'method' => 'patch']) !!}

                        @include('data_barangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection