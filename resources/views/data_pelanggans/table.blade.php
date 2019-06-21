<table class="table table-responsive" id="dataPelanggans-table">
    <thead>
        <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th colspan="3">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataPelanggans as $dataPelanggan)
        <tr>
            <td>{!! $dataPelanggan->ID_PELANGGAN !!}</td>
            <td>{!! $dataPelanggan->NAMA !!}</td>
            <td>{!! $dataPelanggan->ALAMAT !!}</td>
            <td>{!! $dataPelanggan->NO_TELP !!}</td>
            <td>
                {!! Form::open(['route' => ['dataPelanggans.destroy', $dataPelanggan->ID_PELANGGAN], 'method' => 'delete']) !!}
                {{-- <div class='btn-group'> --}}
                    {{-- <a href="{!! route('dataPelanggans.show', [$dataPelanggan->ID_PELANGGAN]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                <div class='btn-group'>
                    @if(auth()->user()->role->guard_name == 'admin')
                    <a href="{!! route('dataMotorPelanggans.index', [$dataPelanggan->ID_PELANGGAN]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-eye-open"> Lihat Data Motor</i></a>
                    @endif
                </div>
                <div class='btn-group'>
                    @if(auth()->user()->role->guard_name == 'admin')
                    <a href="{!! route('dataPelanggans.edit', [$dataPelanggan->ID_PELANGGAN]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"> Edit</i></a>
                    @endif
                </div>
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"> Hapus</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>