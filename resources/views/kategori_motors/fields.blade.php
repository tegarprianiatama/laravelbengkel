<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::text('KETERANGAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kategoriMotors.index') !!}" class="btn btn-default">Cancel</a>
</div>
