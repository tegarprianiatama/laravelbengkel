<table class="table table-responsive" id="dataSuppliers-table" style="width: 100%">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama Supplier</th>
        <th>Alamat Supplier</th>
        <th>Cabang Supplier</th>
        <th>No Telp Supplier</th>
        <th>Aksi</th>
        </tr>
    </thead>
    {{-- <tfoot>
        <tr>
        <th>No</th>
        <th>Nama Supplier</th>
        <th>Alamat Supplier</th>
        <th>Cabang Supplier</th>
        <th>No Telp Supplier</th>
        <th>Action</th>
        </tr>
    </tfoot> --}}
    {{-- <tbody>
    @foreach($dataSuppliers as $dataSupplier)
        <tr>
            <td>{!! $dataSupplier->NAMA_SUPPLIER !!}</td>
            <td>{!! $dataSupplier->ALAMAT_SUPPLIER !!}</td>
            <td>{!! $dataSupplier->CABANG_SUPPLIER !!}</td>
            <td>{!! $dataSupplier->NO_TELP_SUPPLIER !!}</td>
            <td>
                {!! Form::open(['route' => ['dataSuppliers.destroy', $dataSupplier->ID_SUPPLIER], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataSuppliers.show', [$dataSupplier->ID_SUPPLIER]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataSuppliers.edit', [$dataSupplier->ID_SUPPLIER]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody> --}}
</table>