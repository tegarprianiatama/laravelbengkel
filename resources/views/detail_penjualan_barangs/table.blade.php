<table class="table table-responsive" id="detailPenjualanBarangs-table">
    <thead>
        <tr>
            <th>No Nota Transaksi Penjualan</th>
            <th>Barang</th>
            <th>Qty</th>
            <th>Harga Jual</th>
            <th>Sub Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($detailPenjualanBarangs as $detailPenjualanBarang)
        <tr>

            <td>{!! $detailPenjualanBarang->ID_TRANSAKSI_PENJUALAN !!}</td>
            <td>{!! $detailPenjualanBarang->dataBarang->NAMA_BARANG !!}</td>
            <td>{!! $detailPenjualanBarang->QTY !!}</td>
            <td>{!! $detailPenjualanBarang->HARGA_JUAL !!}</td>
            <td>{!! $detailPenjualanBarang->SUBTOTAL !!}</td>
            <td>
                {!! Form::open(['route' => ['detailPenjualanBarangs.destroy', $detailPenjualanBarang->ID_PENJUALAN_BARANG], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('detailPenjualanBarangs.show', [$detailPenjualanBarang->ID_PENJUALAN_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {{-- <a href="{!! route('detailPenjualanBarangs.edit', [$detailPenjualanBarang->ID_PENJUALAN_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>