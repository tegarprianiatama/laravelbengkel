<table class="table table-responsive" id="detailPembelianBarangs-table">
    <thead>
        <tr>
        <th>No Nota Pembelian Barang</th>
        <th>Barang</th>
        <th>Qty</th>
        <th>Harga Modal</th>
        <th>Sub Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($detailPembelianBarangs as $detailPembelianBarang)
        <tr>
            <td>{!! $detailPembelianBarang->ID_DATA_PEMBELIAN_BARANG !!}</td>
            <td>{!! $detailPembelianBarang->dataBarang->NAMA_BARANG !!}</td>
            <td>{!! $detailPembelianBarang->QTY !!}</td>
            <td>{!! $detailPembelianBarang->HARGA_MODAL !!}</td>
            <td>{!! $detailPembelianBarang->SUBTOTAL !!}</td>
            <td>
                {!! Form::open(['route' => ['detailPembelianBarangs.destroy', $detailPembelianBarang->ID_DETAIL_PEMBELIAN_BARANG], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('detailPembelianBarangs.show', [$detailPembelianBarang->ID_DETAIL_PEMBELIAN_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {{-- <a href="{!! route('detailPembelianBarangs.edit', [$detailPembelianBarang->ID_DETAIL_PEMBELIAN_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>