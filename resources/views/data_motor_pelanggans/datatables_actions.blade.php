{!! Form::open(['route' => ['dataMotorPelanggans.destroy', $row->ID_PELANGGAN, $row], 'method' => 'delete']) !!}
	{{-- <div class='btn-group'>
		<a href="{!! route('dataMotorPelanggans.show', [ $row->ID_PELANGGAN ]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
	</div> --}}

	<div class='btn-group'>
		<a href="{!! route('dataMotorPelanggans.edit', ['idPelanggan' => $row->ID_PELANGGAN, 'id' => $row]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
	</div>

	<div class='btn-group'>
		{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
	</div>
{!! Form::close() !!}