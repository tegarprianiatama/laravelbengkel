<!-- Id Pelanggan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_PELANGGAN', 'Nama Pelanggan :') !!}
    {!! Form::hidden('ID_PELANGGAN', isset($dataPelanggan) ? $dataPelanggan->ID_PELANGGAN : null, ['class' => 'form-control', 'readonly' => 'true']) !!}
    <br>
    {{ isset($dataPelanggan) ? $dataPelanggan->NAMA : null, }}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA', 'Nama Motor :') !!}
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
    {!! Form::label('ID_KATEGORI', 'Kategori:') !!}
    {!! Form::select('ID_KATEGORI', $kategorimotor, null, ['class' => 'form-control', 'placeholder' => 'Pilih Kategori']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {{-- <a href="{!! route('dataMotorPelanggans.index', request()->segment(3)) !!}" class="btn btn-default">Cancel</a> --}}
</div>
