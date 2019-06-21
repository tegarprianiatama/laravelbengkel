<!-- Id Detail Jasa Servis Field -->
<div class="form-group">
    {!! Form::label('ID_DETAIL_JASA_SERVIS', 'No Detail Jasa Servis:') !!}
    <p>{!! $detailTransaksi->ID_DETAIL_JASA_SERVIS !!}</p>
</div>

<!-- Id Data Transaksi Field -->
<div class="form-group">
    {!! Form::label('ID_DATA_TRANSAKSI', 'No Data Transaksi:') !!}
    <p>{!! $detailTransaksi->ID_DATA_TRANSAKSI !!}</p>
</div>

<!-- Id Barang Field -->
<div class="form-group">
    {!! Form::label('ID_BARANG', 'Barang:') !!}
    <p>{!! $detailTransaksi->ID_BARANG !!}</p>
</div>

{{-- <!-- Id Jasa Servis Field -->
<div class="form-group">
    {!! Form::label('ID_JASA_SERVIS', 'Id Jasa Servis:') !!}
    <p>{!! $detailTransaksi->ID_JASA_SERVIS !!}</p>
</div> --}}

<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('QTY', 'Qty:') !!}
    <p>{!! $detailTransaksi->QTY !!}</p>
</div>

<!-- Diskon Field -->
<div class="form-group">
    {!! Form::label('DISKON', 'Diskon:') !!}
    <p>{!! $detailTransaksi->DISKON !!}</p>
</div>

<!-- Sub Total Field -->
<div class="form-group">
    {!! Form::label('SUB_TOTAL', 'Sub Total:') !!}
    <p>{!! $detailTransaksi->SUB_TOTAL !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $detailTransaksi->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $detailTransaksi->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $detailTransaksi->deleted_at !!}</p>
</div>

