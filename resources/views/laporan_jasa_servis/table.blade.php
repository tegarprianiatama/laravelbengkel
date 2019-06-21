<table class="table table-responsive" id="laporanJasaServis-table">
    <thead>
        <tr>
            <th>Mulai Tanggal</th>
        <th>Sampai Tanggal</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($laporanJasaServis as $laporanJasaServis)
        <tr>
            <td>{!! $laporanJasaServis->MULAI_TANGGAL !!}</td>
            <td>{!! $laporanJasaServis->SAMPAI_TANGGAL !!}</td>
            <td>
                {!! Form::open(['route' => ['laporanJasaServis.destroy', $laporanJasaServis->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('laporanJasaServis.show', [$laporanJasaServis->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('laporanJasaServis.edit', [$laporanJasaServis->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>