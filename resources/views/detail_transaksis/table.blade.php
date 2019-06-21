<table class="table table-responsive" id="detailTransaksis-table">
    <thead>
        <tr>
        <th>No Nota Transaksi</th>
        <th>Barang</th>
{{--         <th>Id Jasa Servis</th> --}}
        <th>Qty</th>
        <th>Diskon</th>
        <th>Sub Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($detailTransaksis as $detailTransaksi)
        <tr>
            <td>{!! $detailTransaksi->ID_DATA_TRANSAKSI !!}</td>           
            <td>{!! $detailTransaksi->dataBarang->NAMA_BARANG !!}</td>           
{{--             <td>{!! $detailTransaksi->ID_JASA_SERVIS !!}</td> --}}
            <td>{!! $detailTransaksi->QTY !!}</td>
            <td>{!! $detailTransaksi->DISKON !!}</td>
            <td>{!! $detailTransaksi->SUB_TOTAL !!}</td>
            <td>
                {!! Form::open(['route' => ['detailTransaksis.destroy', $detailTransaksi->ID_DETAIL_JASA_SERVIS], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('detailTransaksis.show', [$detailTransaksi->ID_DETAIL_JASA_SERVIS]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {{-- <a href="{!! route('detailTransaksis.edit', [$detailTransaksi->ID_DETAIL_JASA_SERVIS]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>