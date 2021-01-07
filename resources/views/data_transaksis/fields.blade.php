<!-- Id Pelanggan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_PELANGGAN', 'Pelanggan:') !!}
    {!! Form::select('ID_PELANGGAN', $datapelanggan, null, ['class' => 'form-control select-pelanggan','placeholder'=>'Pilih Pelanggan']) !!}
</div>

<!-- Id Kasir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_KASIR', 'Kasir:') !!}
    <select class="form-control" id="ID_KASIR" name="ID_KASIR" style="display: none">
    @foreach ($datakasir as $key => $value)
        <option value="{{ $key }}"
        @if ($value == Auth::user()->name)
            selected="selected"
            <?php
                $ID_KASIR = $key;
                $NAMA_KASIR = $value;
            ?>
        @endif
        >{{ $value }}</option>
    @endforeach
    </select>
    {!! Form::text('', $NAMA_KASIR, ['class' => 'form-control', 'readonly' => 'true']) !!}
    {!! Form::hidden('ID_KASIR', $ID_KASIR, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Id Mekanik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_MEKANIK', 'Mekanik:') !!}
    {!! Form::select('ID_MEKANIK', $datamekanik, null, ['class' => 'form-control select-mekanik', 'placeholder' => 'Pilih Mekanik']) !!}
</div>

<!-- Id Detail Motor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_DETAIL_MOTOR', 'Detail Motor:') !!}
    {!! Form::select('ID_DETAIL_MOTOR', $datamotorpelanggan, null, ['class' => 'form-control select-detail-motor', 'placeholder' => 'Pilih Motor Pelanggan']) !!}
</div>

<!-- Id Jasa Servis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_JASA_SERVIS', 'Jasa Servis:') !!}
    {!! Form::select('ID_JASA_SERVIS', $datajasaservis, null, ['class' => 'form-control select-jasa_servis', 'placeholder' => 'Pilih Jasa']) !!}
</div>

<!-- Tgl Penjualan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TGL_PENJUALAN', 'Tgl Penjualan:') !!}
    {!! Form::text('TGL_PENJUALAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    {!! Form::text('KETERANGAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Biaya Tambahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('BIAYA_TAMBAHAN', 'Biaya Tambahan:') !!}
    {!! Form::text('BIAYA_TAMBAHAN', 0, ['ID' => 'BIAYA_TAMBAHAN', 'class' => 'form-control', 'onchange' => 'hitungTotalAll()']) !!}
</div>

<!-- Total Jasa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TOTAL_JASA', 'Total Jasa :') !!}
    {!! Form::text('TOTAL_JASA', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TOTAL_BARANG', 'Total Barang :') !!}
    {!! Form::text('TOTAL_BARANG', null, ['class' => 'form-control']) !!}
</div>

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
        {!! Form::text('_harga_jual', null, ['class' => 'form-control','id'=>'HARGA_JUAL','readonly','placeholder'=>'Harga']) !!}
        {!! Form::text('_biaya_pemasangan', null, ['class' => 'form-control','id'=>'BIAYA_PEMASANGAN','readonly','placeholder'=>'Biaya Pemasangan']) !!}
        {!! Form::text('_diskon', null, ['class' => 'form-control','id'=>'DISKON','placeholder'=>'Diskon']) !!}
        {!! Form::hidden('_subtotal', null, ['class' => 'form-control','id'=>'subtotal','readonly','placeholder'=>'Harga']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::text('_qty', null, ['class' => 'form-control','id'=>'qty','placeholder'=>'Jumlah','autocomplete'=>'off']) !!}
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-sm btn-info" id="btn-tambah">Tambah</button>
    </div>
</div>
</div>

<div class="form-group col-md-12">
    <h4>Data Transaksi</h4>
    <table class="table table-responsive table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Biaya Pemasangan</th>
                <th>Qty</th>
                <th>Diskon</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="daftar-penjualan">
            @if(isset($dataTransakasi))
                @foreach($dataTransaksi->detailTransaksi as $key => $detailTransaksi)
                    <tr>
                        <td>{!! ++$key !!}</td>
                        <td>{!! $detailTransaksi->dataBarang->NAMA_BARANG !!}</td>
                        <td>{!! $detailTransaksi->dataBarang->HARGA_JUAL !!}</td>
                        <td>{!! $detailTransaksi->dataBarang->QTY !!}</td>
                        <td>{!! $detailTransaksi->dataBarang->DISKON !!}</td>
                        <td>{!! $detailTransaksi->dataBarang->SUBTOTAL !!}</td>
                        <td>
                            {!! Form::open(['route' => ['detailPenjualanBarangs.destroy', $detailPenjualanBarang->ID_PENJUALAN_BARANG], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('detailPenjualanBarangs.show', [$detailPenjualanBarang->ID_PENJUALAN_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('detailPenjualanBarangs.edit', [$detailPenjualanBarang->ID_PENJUALAN_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TOTAL_DISKON', 'Diskon Total :') !!}
    {!! Form::text('TOTAL_DISKON', 0, ['class' => 'form-control', 'autocomplete'=>'off', 'id' => 'TOTAL_DISKON', 'onchange' => 'hitungTotalAll()']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('TOTAL', 'Total :') !!}
    {!! Form::hidden('TOTAL', null, ['class' => 'form-control']) !!}
    {!! Form::text('TOTAL_BERSIH', 0, ['class' => 'form-control', 'id' => 'TOTAL_BERSIH', 'readonly']) !!}
    {!! Form::hidden('KEMBALIAN', 0, ['class' => 'form-control', 'id' => 'KEMBALIAN', 'readonly']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('JUMLAH_BAYAR', 'Jumlah Bayar :') !!}
    {!! Form::text('JUMLAH_BAYAR', 0, ['class' => 'form-control', 'autocomplete'=>'off', 'id' => 'JUMLAH_BAYAR', 'onchange' => 'hitungTotalAll()']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataTransaksis.index') !!}" class="btn btn-default">Cancel</a>
</div>
