<!-- Id Pelanggan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_PELANGGAN', 'Pelanggan:') !!}
    {!! Form::text('ID_PELANGGAN', isset($dataPelanggan) ? $dataPelanggan->NAMA : '', ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama Motor:') !!}
    {!! Form::text('NAMA', null, ['class' => 'form-control']) !!}
</div>

<!-- No Pol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NO_POL', 'No Pol:') !!}
    {!! Form::text('NO_POL', null, ['class' => 'form-control']) !!}
</div>

<!-- Isi Silider Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ISI_SILIDER', 'Isi Silider:') !!}
    {!! Form::number('ISI_SILIDER', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KATEGORI_ID', 'Kategori:') !!}
    {!! Form::select('KATEGORI_ID', $kategorimotor, null, ['class' => 'form-control', 'placeholder' => 'Pilih Kategori']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {{-- <a href="{!! route('dataMotorPelanggans.index', request()->segment(3)) !!}" class="btn btn-default">Cancel</a> --}}
</div>
