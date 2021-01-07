<!-- Id Pelanggan Field -->
<div class="form-group">
    {!! Form::label('ID_PELANGGAN', 'No Pelanggan :') !!}
    <p>{!! $dataMotorPelanggan->dataPelanggan->NAMA !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('NAMA', 'Nama :') !!}
    <p>{!! $dataMotorPelanggan->NAMA !!}</p>
</div>

<!-- No Pol Field -->
<div class="form-group">
    {!! Form::label('NO_POL', 'No Pol :') !!}
    <p>{!! $dataMotorPelanggan->NO_POL !!}</p>
</div>

<!-- Isi Silider Field -->
<div class="form-group">
    {!! Form::label('ISI_SILIDER', 'Isi Silider :') !!}
    <p>{!! $dataMotorPelanggan->ISI_SILIDER !!}</p>
</div>

<!-- Kategori Field -->
<div class="form-group">
    {!! Form::label('ID_KATEGORI', 'Kategori Motor :') !!}
    <p>{!! $dataMotorPelanggan->ID_KATEGORI !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At :') !!}
    <p>{!! $dataMotorPelanggan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At :') !!}
    <p>{!! $dataMotorPelanggan->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At :') !!}
    <p>{!! $dataMotorPelanggan->deleted_at !!}</p>
</div>

