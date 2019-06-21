<!-- Id Barang Field -->
<div class="form-group">
    {!! Form::label('ID_BARANG', 'Id Barang:') !!}
    <p>{!! $dataBarang->ID_BARANG !!}</p>
</div>

<!-- Kode Barang Field -->
<div class="form-group">
    {!! Form::label('KODE_BARANG', 'Kode Barang:') !!}
    <p>{!! $dataBarang->KODE_BARANG !!}</p>
</div>

<!-- Nama Barang Field -->
<div class="form-group">
    {!! Form::label('NAMA_BARANG', 'Nama Barang:') !!}
    <p>{!! $dataBarang->NAMA_BARANG !!}</p>
</div>

<!-- Supplier Field -->
<div class="form-group">
    {!! Form::label('ID_SUPPLIER', 'Supplier:') !!}
    <p>{!! $dataBarang->datasupplier->NAMA_SUPPLIER !!}</p>
</div>

<!-- Stok Field -->
<div class="form-group">
    {!! Form::label('STOK', 'Stok:') !!}
    <p>{!! $dataBarang->STOK !!}</p>
</div>

<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('SATUAN', 'Satuan:') !!}
    <p>{!! $dataBarang->SATUAN !!}</p>
</div>

<!-- Harga Modal Field -->
<div class="form-group">
    {!! Form::label('HARGA_MODAL', 'Harga Modal:') !!}
    <p>{!! $dataBarang->HARGA_MODAL !!}</p>
</div>

<!-- Harga Jual Field -->
<div class="form-group">
    {!! Form::label('HARGA_JUAL', 'Harga Jual:') !!}
    <p>{!! $dataBarang->HARGA_JUAL !!}</p>
</div>

<!-- Jenis Field -->
<div class="form-group">
    {!! Form::label('JENIS', 'Jenis:') !!}
    <p>{!! $dataBarang->JENIS !!}</p>
</div>

<!-- Biaya Pemasangan Field -->
<div class="form-group">
    {!! Form::label('BIAYA_PEMASANGAN', 'Biaya Pemasangan:') !!}
    <p>{!! $dataBarang->BIAYA_PEMASANGAN !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    <p>{!! $dataBarang->KETERANGAN !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $dataBarang->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $dataBarang->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $dataBarang->deleted_at !!}</p>
</div>

