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

<!-- Id Barang Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('ID_BARANG', 'Id Barang:') !!}
    {!! Form::select('ID_BARANG', $databarang, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Qty Field -->
<!-- div class="form-group col-sm-6">
    {!! Form::label('QTY', 'Qty:') !!}
    {!! Form::text('QTY', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Harga Jual Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('HARGA_JUAL', 'Harga Jual:') !!}
    {!! Form::number('HARGA_JUAL', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Total Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('TOTAL', 'Total:') !!}
    {!! Form::text('TOTAL', null, ['class' => 'form-control','id' => 'TOTAL','readonly']) !!}
    {!! Form::hidden('TOTAL_BERSIH', 0, ['class' => 'form-control', 'id' => 'TOTAL_BERSIH', 'readonly']) !!}
    {!! Form::hidden('KEMBALIAN', 0, ['class' => 'form-control', 'id' => 'KEMBALIAN', 'readonly']) !!}
</div> --}}

<!-- Submit Field -->
<!-- <div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataPenjualanBarangs.index') !!}" class="btn btn-default">Cancel</a>
</div>
 -->

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
        {!! Form::hidden('_subtotal', null, ['class' => 'form-control','id'=>'subtotal','readonly','placeholder'=>'Harga']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::text('_qty', null, ['class' => 'form-control','id'=>'qty','placeholder'=>'Jumlah','autocomplete'=>'off']) !!}
    </div>
    <div class="col-md-3">
        <button class="btn btn-sm btn-info" id="btn-tambah">Tambah</button>
    </div>
</div>
</div>

<div class="form-group col-md-12">
    <h4>Daftar Penjualan</h4>
    <!-- <div class="row" style="border-bottom: 1px solid #eeeeee;margin-bottom: 15px;padding-bottom: 5px;">
        <div class="col-md-1">No</div>
        <div class="col-md-3">Nama Barang</div>
        <div class="col-md-2">Harga</div>
        <div class="col-md-2">Qty</div>
        <div class="col-md-2">Subtotal</div>
    </div>
    <div id="daftar-penjualan">
    
    </div> -->
    <table class="table table-responsive table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="daftar-penjualan">
            @if(isset($dataPenjualanBarang))
                @foreach($dataPenjualanBarang->detailPenjualanBarang as $key => $detailPenjualanBarang)
                    <tr>
                        <td>{!! ++$key !!}</td>
                        <td>{!! $detailPenjualanBarang->dataBarang->NAMA_BARANG !!}</td>
                        <td>{!! $detailPenjualanBarang->dataBarang->HARGA_JUAL !!}</td>
                        <td>{!! $detailPenjualanBarang->dataBarang->QTY !!}</td>
                        <td>{!! $detailPenjualanBarang->dataBarang->DISKON !!}</td>
                        <td>{!! $detailPenjualanBarang->dataBarang->SUBTOTAL !!}</td>
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
    <a href="{!! route('detailPenjualanBarangs.index') !!}" class="btn btn-default">Cancel</a>
</div>

{{-- @section('scripts')
    <script>
        $(document).ready(function() {
            $('#TGL_PENJUALAN').datepicker({
                autoclose : true,
                format: 'mm/dd/yyyy'
            });
        });
    </script>
@endsection --}}