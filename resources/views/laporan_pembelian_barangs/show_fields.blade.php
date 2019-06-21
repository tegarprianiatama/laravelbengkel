<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $laporanPembelianBarang->id !!}</p>
</div>

<!-- Mulai Tanggal Field -->
<div class="form-group">
    {!! Form::label('MULAI_TANGGAL', 'Mulai Tanggal:') !!}
    <p>{!! $laporanPembelianBarang->MULAI_TANGGAL !!}</p>
</div>

<!-- Sampai Tanggal Field -->
<div class="form-group">
    {!! Form::label('SAMPAI_TANGGAL', 'Sampai Tanggal:') !!}
    <p>{!! $laporanPembelianBarang->SAMPAI_TANGGAL !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $laporanPembelianBarang->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $laporanPembelianBarang->updated_at !!}</p>
</div>

