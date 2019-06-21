<table class="table table-responsive" id="laporanPembelianBarangs-table">
    <thead>
        <tr>
            <th>Mulai Tanggal</th>
        <th>Sampai Tanggal</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($laporanPembelianBarangs as $laporanPembelianBarang)
        <tr>
            <td>{!! $laporanPembelianBarang->MULAI_TANGGAL !!}</td>
            <td>{!! $laporanPembelianBarang->SAMPAI_TANGGAL !!}</td>
            <td>
                {!! Form::open(['route' => ['laporanPembelianBarangs.destroy', $laporanPembelianBarang->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('laporanPembelianBarangs.show', [$laporanPembelianBarang->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('laporanPembelianBarangs.edit', [$laporanPembelianBarang->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>