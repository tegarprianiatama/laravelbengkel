@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Jasa Servis</h1>
        <h1 class="pull-right">
           <a class="btn btn-block btn-primary btn-sm" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dataJasaServis.create') !!}">Tambah Data Jasa Servis</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('data_jasa_servis.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

