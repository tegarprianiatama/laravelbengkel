<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $laporanJasaServis->id !!}</p>
</div>

<!-- Mulai Tanggal Field -->
<div class="form-group">
    {!! Form::label('MULAI_TANGGAL', 'Mulai Tanggal:') !!}
    <p>{!! $laporanJasaServis->MULAI_TANGGAL !!}</p>
</div>

<!-- Sampai Tanggal Field -->
<div class="form-group">
    {!! Form::label('SAMPAI_TANGGAL', 'Sampai Tanggal:') !!}
    <p>{!! $laporanJasaServis->SAMPAI_TANGGAL !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $laporanJasaServis->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $laporanJasaServis->updated_at !!}</p>
</div>

