<table class="table table-responsive" id="roles-table">
    <thead>
        <tr>
        <th>Nama</th>
        <th>Role</th>
        {{-- <th>No Telp</th> --}}
            {{-- <th colspan="3">Action</th> --}}
        </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{!! $role->name !!}</td>
            <td>{!! $role->guard_name !!}</td>
           {{--  <td>{!! $dataMekanik->NO_TELP !!}</td> --}}
            {{-- <td>
                {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td> --}}
        </tr>
    @endforeach
    </tbody>
</table>