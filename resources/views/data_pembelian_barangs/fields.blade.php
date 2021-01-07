<!-- Id Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_SUPPLIER', 'Supplier:') !!}
    {!! Form::select('ID_SUPPLIER', $datasupplier, null, ['class' => 'form-control select-supplier', 'placeholder'=>'Pilih Supplier']) !!}
</div>

<!-- Tgl Pembelian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TGL_PEMBELIAN', 'Tgl Pembelian:') !!}
    {!! Form::datetime('TGL_PEMBELIAN', \Carbon\Carbon::parse(now())->format('m-d-Y'), ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::text('KETERANGAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Barang Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('ID_BARANG', 'Barang:') !!}
    {!! Form::select('ID_BARANG', $databarang, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Qty Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('QTY', 'Qty:') !!}
    {!! Form::text('QTY', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Harga Modal Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('HARGA_MODAL', 'Harga Modal:') !!}
    {!! Form::number('HARGA_MODAL', null, ['class' => 'form-control']) !!}
</div> -->

<div class="col-md-2">
    {!! Form::label('Barang Baru', 'Tambah Barang Baru:') !!}<br>
    <a onclick="openInNewTab({!! route('dataBarangs.create') !!})" id="MyButton" class="btn btn-sm btn-info glyphicon glyphicon-plus"></a>
</div>
<!-- Total Field -->

<!-- Submit Field -->
<!-- <div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailPembelianBarangs.index') !!}" class="btn btn-default">Cancel</a>
</div> -->

<div class="form-group col-md-12">
<h4>Barang</h4>
<div class="row">
    <div class="col-md-3">
        {!! Form::select('barang_id', $databarang, null, ['class' => 'form-control select-barang','placeholder'=>'Pilih Barang']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::hidden('_kode_barang', null, ['class' => 'form-control','id'=>'KODE_BARANG','readonly']) !!}
        {!! Form::hidden('_nama_barang', null, ['class' => 'form-control','id'=>'NAMA_BARANG','readonly']) !!}
        {!! Form::hidden('_id_barang', null, ['class' => 'form-control','id'=>'ID_BARANG','readonly']) !!}
        {!! Form::text('_harga_modal', null, ['class' => 'form-control','id'=>'HARGA_MODAL','readonly','placeholder'=>'Harga Lama']) !!}
        {!! Form::hidden('_subtotal', null, ['class' => 'form-control','id'=>'subtotal','readonly','placeholder'=>'Harga']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::number('_harga_baru', 0, ['class' => 'form-control','id'=>'HARGA_BARU','placeholder'=>'Harga','autocomplete'=>'off', 'placeholder'=>'Harga Baru']) !!}
        <small><i style="color:red;">*Harga Baru</i></small>
    </div>
    <div class="col-md-2">
        {!! Form::text('_qty', null, ['class' => 'form-control','id'=>'qty','placeholder'=>'Jumlah','autocomplete'=>'off']) !!}
    </div>
    <div class="col-md-1">
        <button class="btn btn-sm btn-info" id="btn-tambah">Tambah</button>
    </div>
</div>
</div>

<div class="form-group col-md-12">
    <h4>Daftar Pembelian</h4>
    <table class="table table-responsive table-hover table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Harga Baru</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="daftar-pembelian">
            
        </tbody>
    </table>
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DISKON', 'Diskon Total :') !!}
    {!! Form::text('DISKON', 0, ['class' => 'form-control', 'autocomplete'=>'off', 'id' => 'DISKON']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('TOTAL', 'Total:') !!}
    {!! Form::hidden('TOTAL', null, ['class' => 'form-control','id' => 'TOTAL','readonly']) !!}
    {!! Form::text('TOTAL_BERSIH', 0, ['class' => 'form-control', 'id' => 'TOTAL_BERSIH', 'readonly']) !!}
    {!! Form::hidden('KEMBALIAN', 0, ['class' => 'form-control', 'id' => 'KEMBALIAN', 'readonly']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('JUMLAH_BAYAR', 'Jumlah Bayar :') !!}
    {!! Form::text('JUMLAH_BAYAR', 0, ['class' => 'form-control', 'autocomplete'=>'off', 'id' => 'JUMLAH_BAYAR']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailPembelianBarangs.index') !!}" class="btn btn-default">Cancel</a>
</div>
