<!-- Kode Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KODE_BARANG', 'Kode Barang:') !!}
    {!! Form::text('KODE_BARANG', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA_BARANG', 'Nama Barang:') !!}
    {!! Form::text('NAMA_BARANG', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Id Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_SUPPLIER', 'Supplier:') !!}
    {!! Form::select('ID_SUPPLIER', $datasupplier, null, ['class' => 'form-control', 'placeholder' => 'Pilih Supplier']) !!}
</div> --}}

<!-- Id Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_SUPPLIER', 'Supplier:') !!}
    {!! Form::select('ID_SUPPLIER', $datasupplier, null, ['class' => 'form-control select-supplier','placeholder'=>'Pilih Supplier']) !!}
</div>

<!-- Stok Field -->
<div class="form-group col-sm-6">
    {!! Form::label('STOK', 'Stok:') !!}
    {!! Form::number('STOK', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SATUAN', 'Satuan:') !!}
    {!! Form::text('SATUAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Modal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('HARGA_MODAL', 'Harga Modal:') !!}
    {!! Form::number('HARGA_MODAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('HARGA_JUAL', 'Harga Jual:') !!}
    {!! Form::number('HARGA_JUAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('JENIS', 'Jenis:') !!}
    {!! Form::text('JENIS', null, ['class' => 'form-control']) !!}
</div>

<!-- Biaya Pemasangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('BIAYA_PEMASANGAN', 'Biaya Pemasangan:') !!}
    {!! Form::number('BIAYA_PEMASANGAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::text('KETERANGAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataBarangs.index') !!}" class="btn btn-default">Cancel</a>
</div>
