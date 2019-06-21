<!-- Nama Mekanik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- No Telp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Role:') !!}
    {!! Form::text('guard_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('ALAMAT', 'Alamat:') !!}
    {!! Form::textarea('ALAMAT', null, ['class' => 'form-control']) !!}
</div> --}}


<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
