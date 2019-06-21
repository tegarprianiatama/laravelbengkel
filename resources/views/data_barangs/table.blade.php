<table class="table table-responsive oke" id="dataBarangs-table" style="width: 100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Supplier</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga Modal</th>
            <th>Harga Jual</th>
            <th>Jenis</th>
            <th>Biaya Pemasangan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Supplier</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga Modal</th>
            <th>Harga Jual</th>
            <th>Jenis</th>
            <th>Biaya Pemasangan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
    {{-- <tbody>
    @foreach($dataBarangs as $dataBarang)
        <tr>
            <td>{!! $dataBarang->KODE_BARANG !!}</td>
            <td>{!! $dataBarang->NAMA_BARANG !!}</td>
            <td>{!! $dataBarang->STOK !!}</td>
            <td>{!! $dataBarang->SATUAN !!}</td>
            <td>{!! $dataBarang->HARGA_MODAL !!}</td>
            <td>{!! $dataBarang->HARGA_JUAL !!}</td>
            <td>{!! $dataBarang->JENIS !!}</td>
            <td>{!! $dataBarang->BIAYA_PEMASANGAN !!}</td>
            <td>{!! $dataBarang->KETERANGAN !!}</td>
            <td>
                {!! Form::open(['route' => ['dataBarangs.destroy', $dataBarang->ID_BARANG], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataBarangs.show', [$dataBarang->ID_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataBarangs.edit', [$dataBarang->ID_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody> --}}
</table>