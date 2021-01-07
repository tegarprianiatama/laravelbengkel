{!! Form::open(['route' => ['dataPenjualanBarangs.destroy', $ID_TRANSAKSI_PENJUALAN], 'method' => 'delete']) !!}
<div class='btn-group'>
	<a href="{!! route('dataPenjualanBarangs.show', [$ID_TRANSAKSI_PENJUALAN]) !!}" class="btn btn-primary btn-sm"><i class="fa fa-external-link">Detail</i></a></div>
<div class='btn-group'>
@if(auth()->user()->role->guard_name == 'admin')
	{!! Form::button('<i class="glyphicon glyphicon-trash">Hapus</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
@endif
</div>
{!! Form::close() !!}