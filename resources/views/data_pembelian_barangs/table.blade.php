<table class="table table-responsive" id="dataPembelianBarangs-table" style="width: 100%">
    <thead>
        <tr>
        <th>No</th>
        <th>Supplier</th>
        <th>Tgl Pembelian</th>
        <th>Keterangan</th>
        <th>Total</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>No</th>
        <th>Supplier</th>
        <th>Tgl Pembelian</th>
        <th>Keterangan</th>
        <th>Total</th>
        <th>Aksi</th>
        </tr>
    </tfoot>
    {{-- <tbody>
    @foreach($dataPembelianBarangs as $dataPembelianBarang)
        <tr>
            <td>{!! $dataPembelianBarang->dataSupplier->NAMA_SUPPLIER !!}</td>
            <td>{!! date_format($dataPembelianBarang->TGL_PEMBELIAN, 'Y-m-d') !!}</td>
            <td>{!! $dataPembelianBarang->KETERANGAN !!}</td>
            <td>{!! $dataPembelianBarang->TOTAL !!}</td>
            <td>
                {!! Form::open(['route' => ['dataPembelianBarangs.destroy', $dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataPembelianBarangs.show', [$dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {{-- <a href="{!! route('dataPembelianBarangs.edit', [$dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody> --}}
</table>