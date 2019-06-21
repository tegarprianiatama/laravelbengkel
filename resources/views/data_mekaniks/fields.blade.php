<!-- Nama Mekanik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA_MEKANIK', 'Nama Mekanik:') !!}
    {!! Form::text('NAMA_MEKANIK', null, ['class' => 'form-control']) !!}
</div>

<!-- No Telp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NO_TELP', 'No Telp:') !!}
    {!! Form::text('NO_TELP', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ALAMAT', 'Alamat:') !!}
    {!! Form::textarea('ALAMAT', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataMekaniks.index') !!}" class="btn btn-default">Cancel</a>
</div>
