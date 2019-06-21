<table class="table table-responsive" id="dataMekaniks-table">
    <thead>
        <tr>
            <th>Nama Mekanik</th>
        <th>Alamat</th>
        <th>No Telp</th>
            <th colspan="3">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataMekaniks as $dataMekanik)
        <tr>
            <td>{!! $dataMekanik->NAMA_MEKANIK !!}</td>
            <td>{!! $dataMekanik->ALAMAT !!}</td>
            <td>{!! $dataMekanik->NO_TELP !!}</td>
            <td>
                {!! Form::open(['route' => ['dataMekaniks.destroy', $dataMekanik->ID_MEKANIK], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataMekaniks.show', [$dataMekanik->ID_MEKANIK]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataMekaniks.edit', [$dataMekanik->ID_MEKANIK]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>