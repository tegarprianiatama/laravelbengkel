{!! Form::open(['route' => ['dataTransaksis.destroy', $ID_DATA_TRANSAKSI], 'method' => 'delete']) !!}
<div class='btn-group'>
	<a href="{!! route('dataTransaksis.show', [$ID_DATA_TRANSAKSI]) !!}" class="btn btn-primary btn-sm"><i class="fa fa-external-link">Detail</i></a></div>
	{{-- <a href="{!! route('dataTransaksis.edit', [$ID_DATA_TRANSAKSI]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
<div class='btn-group'>
	@if(auth()->user()->role->guard_name == 'admin')
	{!! Form::button('<i class="glyphicon glyphicon-trash">Hapus</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
@endif
</div>
{!! Form::close() !!}