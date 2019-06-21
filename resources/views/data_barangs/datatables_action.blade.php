{!! Form::open(['route' => ['dataBarangs.destroy', $ID_BARANG], 'method' => 'delete']) !!}
	<div class='btn-group'>
		<a href="{!! route('dataBarangs.show', [$ID_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>

	@if(auth()->user()->role->guard_name == 'admin')
		<a href="{!! route('dataBarangs.edit', [$ID_BARANG]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
		{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
	@endif
	</div>
{!! Form::close() !!}