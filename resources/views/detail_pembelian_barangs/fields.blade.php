<!-- Id Data Pembelian Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_DATA_PEMBELIAN_BARANG', 'No Data Pembelian Barang:') !!}
    {!! Form::number('ID_DATA_PEMBELIAN_BARANG', null, ['class' => 'form-control']) !!}
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

<!-- Harga Modal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('HARGA_MODAL', 'Harga Modal:') !!}
    {!! Form::number('HARGA_MODAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SUBTOTAL', 'Sub Total:') !!}
    {!! Form::number('SUBTOTAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailPembelianBarangs.index') !!}" class="btn btn-default">Cancel</a>
</div>
