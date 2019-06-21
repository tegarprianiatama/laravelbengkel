<!-- Id Data Transaksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_DATA_TRANSAKSI', 'Id Data Transaksi:') !!}
    {!! Form::number('ID_DATA_TRANSAKSI', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_BARANG', 'Id Barang:') !!}
    {!! Form::number('ID_BARANG', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Id Jasa Servis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_JASA_SERVIS', 'Id Jasa Servis:') !!}
    {!! Form::number('ID_JASA_SERVIS', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('QTY', 'Qty:') !!}
    {!! Form::text('QTY', null, ['class' => 'form-control']) !!}
</div>

<!-- Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DISKON', 'Diskon:') !!}
    {!! Form::text('DISKON', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SUB_TOTAL', 'Sub Total:') !!}
    {!! Form::text('SUB_TOTAL', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailTransaksis.index') !!}" class="btn btn-default">Cancel</a>
</div>
