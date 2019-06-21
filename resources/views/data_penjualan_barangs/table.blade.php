<table class="table table-responsive" id="dataPenjualanBarangs-table" style="width: 100%">
    <thead>
        <tr>
        <th>No</th>
        <th>Kasir</th>
        <th>Pelanggan</th>
        <th>Tgl Penjualan</th>
        <th>Keterangan</th>
        <th>Total</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>No</th>
        <th>Kasir</th>
        <th>Pelanggan</th>
        <th>Keterangan</th>
        <th>Total</th>
        <th>Aksi</th>
        </tr>
    </tfoot>
    {{-- <tbody>
    @foreach($dataPenjualanBarangs as $dataPenjualanBarang)
        <tr>
            <td>{!! $dataPenjualanBarang->ID_KASIR !!}</td>
            <td>{!! $dataPenjualanBarang->ID_PELANGGAN !!}</td>
            <td>{!! $dataPenjualanBarang->TGL_PENJUALAN !!}</td>
            <td>{!! $dataPenjualanBarang->KETERANGAN !!}</td>
            <!-- <td>{!! $dataPenjualanBarang->ID_BARANG !!}</td>
            <td>{!! $dataPenjualanBarang->QTY !!}</td>
            <td>{!! $dataPenjualanBarang->HARGA_JUAL !!}</td> -->
            <td>{!! $dataPenjualanBarang->TOTAL !!}</td>
            <td>
                {!! Form::open(['route' => ['dataPenjualanBarangs.destroy', $dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataPenjualanBarangs.show', [$dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataPenjualanBarangs.edit', [$dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody> --}}
</table>