@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Jasa Servis
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataJasaServis, ['route' => ['dataJasaServis.update', $dataJasaServis->ID_JASA_SERVIS], 'method' => 'patch']) !!}

                        @include('data_jasa_servis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection