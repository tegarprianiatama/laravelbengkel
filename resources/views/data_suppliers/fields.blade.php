<!-- Nama Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA_SUPPLIER', 'Nama Supplier:') !!}
    {!! Form::text('NAMA_SUPPLIER', null, ['class' => 'form-control']) !!}
</div>

<!-- Cabang Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CABANG_SUPPLIER', 'Cabang Supplier:') !!}
    {!! Form::text('CABANG_SUPPLIER', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ALAMAT_SUPPLIER', 'Alamat Supplier:') !!}
    {!! Form::textarea('ALAMAT_SUPPLIER', null, ['class' => 'form-control']) !!}
</div>

<!-- No Telp Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NO_TELP_SUPPLIER', 'No Telp Supplier:') !!}
    {!! Form::text('NO_TELP_SUPPLIER', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataSuppliers.index') !!}" class="btn btn-default">Cancel</a>
</div>
