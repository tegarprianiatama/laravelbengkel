{!! Form::open(['route' => ['dataPelanggans.destroy', $row->ID_PELANGGAN, $row], 'method' => 'delete']) !!}
   <div class='btn-group'>
      <a href="{!! route('dataMotorPelanggans.index', [$row->ID_PELANGGAN, $row]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-eye-open"></i></a>
   </div>
   <div class='btn-group'>
      <a href="{!! route('dataPelanggans.edit', [$row->ID_PELANGGAN, $row]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
   </div>
   <div class='btn-group'>
      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
   </div>
{!! Form::close() !!}