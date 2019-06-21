<table class="table table-responsive" id="dataTransaksis-table">
    <thead>
        <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Kasir</th>
        <th>Mekanik</th>
        <th>Detail Motor</th>
        <th>Jasa Servis</th>
        <th>Penjualan</th>
        <th>Keterangan</th>
        <th>Biaya Tambahan</th>
        <th>Total Diskon</th>
        <th>Total</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tfoot>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Kasir</th>
        <th>Mekanik</th>
        <th>Detail Motor</th>
        <th>Jasa Servis</th>
        <th>Tgl Penjualan</th>
        <th>Keterangan</th>
        <th>Biaya Tambahan</th>
        <th>Total Diskon</th>
        <th>Total</th>
        <th>Aksi</th>
    </tfoot>
    {{-- <tbody>
    @foreach($dataTransaksis as $dataTransaksi)
        <tr>
            <td>{!! $dataTransaksi->ID_PELANGGAN !!}</td>
            <td>{!! $dataTransaksi->ID_KASIR !!}</td>
            <td>{!! $dataTransaksi->ID_MEKANIK !!}</td>
            <td>{!! $dataTransaksi->ID_DETAIL_MOTOR !!}</td>
            <td>{!! $dataTransaksi->ID_JASA_SERVIS !!}</td>
            <td>{!! $dataTransaksi->TGL_PENJUALAN !!}</td>
            <td>{!! $dataTransaksi->KETERANGAN !!}</td>
            <td>{!! $dataTransaksi->BIAYA_TAMBAHAN !!}</td>
            <td>{!! $dataTransaksi->TOTAL_DISKON !!}</td>
            <td>{!! $dataTransaksi->TOTAL !!}</td>
            <td>
                {!! Form::open(['route' => ['dataTransaksis.destroy', $dataTransaksi->ID_DATA_TRANSAKSI], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataTransaksis.show', [$dataTransaksi->ID_DATA_TRANSAKSI]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataTransaksis.edit', [$dataTransaksi->ID_DATA_TRANSAKSI]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody> --}}
</table>