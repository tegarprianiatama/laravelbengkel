<!-- Id Transaksi Penjualan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_TRANSAKSI_PENJUALAN', 'No Transaksi Penjualan:') !!}
    {!! Form::number('ID_TRANSAKSI_PENJUALAN', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_BARANG', 'Barang:') !!}
    {!! Form::select('ID_BARANG', '$databarang', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('QTY', 'Qty:') !!}
    {!! Form::number('QTY', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('HARGA_Jual', 'Harga Jual:') !!}
    {!! Form::number('HARGA_JUAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SUBTOTAL', 'Sub Total:') !!}
    {!! Form::number('SUBTOTAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailPenjualanBarangs.index') !!}" class="btn btn-default">Cancel</a>
</div>
