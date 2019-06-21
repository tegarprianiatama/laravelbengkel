<table class="table table-responsive" id="dataJasaServis-table">
    <thead>
        <tr>
            <th>Nama Jasa</th>
        <th>Keterangan</th>
        <th>Harga</th>
            <th colspan="3">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataJasaServis as $dataJasaServis)
        <tr>
            <td>{!! $dataJasaServis->NAMA_JASA !!}</td>
            <td>{!! $dataJasaServis->KETERANGAN !!}</td>
            <td>{!! $dataJasaServis->HARGA !!}</td>
            <td>
                {!! Form::open(['route' => ['dataJasaServis.destroy', $dataJasaServis->ID_JASA_SERVIS], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @if(auth()->user()->role->guard_name == 'admin')
                    <a href="{!! route('dataJasaServis.show', [$dataJasaServis->ID_JASA_SERVIS]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataJasaServis.edit', [$dataJasaServis->ID_JASA_SERVIS]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>