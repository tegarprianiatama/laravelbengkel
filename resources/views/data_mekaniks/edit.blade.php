@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Mekanik
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataMekanik, ['route' => ['dataMekaniks.update', $dataMekanik->ID_MEKANIK], 'method' => 'patch']) !!}

                        @include('data_mekaniks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection