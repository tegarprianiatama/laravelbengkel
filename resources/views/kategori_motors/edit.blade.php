@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Kategori Motor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kategoriMotor, ['route' => ['kategoriMotors.update', $kategoriMotor->ID_KATEGORI_MOTOR], 'method' => 'patch']) !!}

                        @include('kategori_motors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection