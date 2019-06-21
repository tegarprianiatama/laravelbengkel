<!-- Nama Jasa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA_JASA', 'Nama Jasa:') !!}
    {!! Form::text('NAMA_JASA', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('HARGA', 'Harga:') !!}
    {!! Form::number('HARGA', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::textarea('KETERANGAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataJasaServis.index') !!}" class="btn btn-default">Cancel</a>
</div>
