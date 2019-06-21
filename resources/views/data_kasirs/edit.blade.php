@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Kasir
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataKasir, ['route' => ['dataKasirs.update', $dataKasir->ID_KASIR], 'method' => 'patch','files' => true]) !!}

                        @include('data_kasirs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection