<table class="table table-responsive" id="dataKasirs-table">
    <thead>
        <tr>
        <th>Nama</th>
        {{-- <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th> --}}
        <th>Role</th>
        <th>Email</th>
        <th>No Telp</th>
        <th>Foto</th>
            <th colspan="3">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataKasirs as $dataKasir)
        <tr>
            <td>{!! $dataKasir->NAMA_KASIR !!}</td>
            <td>{!! $dataKasir->role->name !!}</td>
            {{-- <td>{!! $dataKasir->TEMPAT_LAHIR !!}</td>
            <td>{!! $dataKasir->TANGGAL_LAHIR !!}</td>
            <td>{!! $dataKasir->ALAMAT !!}</td> --}}
            <td>{!! $dataKasir->EMAIL !!}</td>
            <td>{!! $dataKasir->NO_TELP !!}</td>
            <td><img src="{!! asset('images/'.$dataKasir->FOTO) !!}" style="width: 100px; height: 100px;"></td>
            <td>
                {!! Form::open(['route' => ['dataKasirs.destroy', $dataKasir->ID_KASIR], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataKasirs.show', [$dataKasir->ID_KASIR]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataKasirs.edit', [$dataKasir->ID_KASIR]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>