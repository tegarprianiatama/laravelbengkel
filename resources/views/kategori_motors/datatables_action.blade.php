{!! Form::open(['route' => ['kategoriMotors.destroy', $ID_KATEGORI_MOTOR], 'method' => 'delete']) !!}
   <div class='btn-group'>
      <a href="{!! route('kategoriMotors.show', [$ID_KATEGORI_MOTOR]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
   </div>
   <div class='btn-group'>
      <a href="{!! route('kategoriMotors.edit', [$ID_KATEGORI_MOTOR]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
   </div>
   <div class='btn-group'>
      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
   </div>
{!! Form::close() !!}