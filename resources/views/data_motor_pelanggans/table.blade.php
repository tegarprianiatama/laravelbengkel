<table class="table table-responsive" id="dataMotorPelanggans-table" style="width: 100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Nama Motor</th>
            <th>No Pol</th>
            <th>Isi Silider</th>
            <th>Kategori</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Nama</th>
            <th>No Pol</th>
            <th>Isi Silider</th>
            <th>Kategori</th>
            <th>Action</th>
        </tr>
    </tfoot>
    {{-- <tbody>
    @foreach($dataMotorPelanggans as $dataMotorPelanggan)
        <tr>
            <td>{!! $dataMotorPelanggan->dataPelanggan->NAMA !!}</td>
            <td>{!! $dataMotorPelanggan->NAMA !!}</td>
            <td>{!! $dataMotorPelanggan->NO_POL !!}</td>
            <td>{!! $dataMotorPelanggan->ISI_SILIDER !!}</td>
            <td>{!! $dataMotorPelanggan->KATEGORI !!}</td>
            <td>
                {!! Form::open(['route' => ['dataMotorPelanggans.destroy', $dataMotorPelanggan->ID_DETAIL_MOTOR], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataMotorPelanggans.show', [$dataMotorPelanggan->ID_DETAIL_MOTOR]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataMotorPelanggans.edit', [$dataMotorPelanggan->ID_DETAIL_MOTOR]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody> --}}
</table>