<table class="table table-responsive" id="kategoriMotors-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Keterangan</th>
            <th colspan="3">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kategoriMotors as $kategoriMotor)
        <tr>
            <td>{!! $kategoriMotor->NAMA !!}</td>
            <td>{!! $kategoriMotor->KETERANGAN !!}</td>
            <td>
                {!! Form::open(['route' => ['kategoriMotors.destroy', $kategoriMotor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kategoriMotors.show', [$kategoriMotor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kategoriMotors.edit', [$kategoriMotor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>