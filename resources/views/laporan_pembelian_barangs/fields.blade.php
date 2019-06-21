<!-- Mulai Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MULAI_TANGGAL', 'Mulai Tanggal:') !!}
    {!! Form::date('MULAI_TANGGAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Sampai Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SAMPAI_TANGGAL', 'Sampai Tanggal:') !!}
    {!! Form::date('SAMPAI_TANGGAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('laporanPembelianBarangs.index') !!}" class="btn btn-default">Cancel</a>
</div>
