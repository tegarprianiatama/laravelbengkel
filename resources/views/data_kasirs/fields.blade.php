<!-- Nama Kasir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NAMA_KASIR', 'Nama:') !!}
    {!! Form::text('NAMA_KASIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ROLE_ID', 'Role:') !!}
    {!! Form::select('ROLE_ID', $role, null, ['class' => 'form-control', 'placeholder' => 'Pilih Role']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TEMPAT_LAHIR', 'Tempat Lahir:') !!}
    {!! Form::text('TEMPAT_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TANGGAL_LAHIR', 'Tanggal Lahir:') !!}
    {!! Form::date('TANGGAL_LAHIR', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ALAMAT', 'Alamat:') !!}
    {!! Form::textarea('ALAMAT', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('EMAIL', 'Email:') !!}
    {!! Form::email('EMAIL', null, ['class' => 'form-control']) !!}
</div>

<!-- No Telp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NO_TELP', 'No Telp:') !!}
    {!! Form::text('NO_TELP', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto -->
<div class="form-group col-sm-6">
    {!! Form::label('FOTO', 'Foto:') !!}
    {!! Form::file('FOTO') !!}
    @if (isset($dataKasir))
            <p><img style="width: 200px" src="{{asset("images/".$dataKasir->foto)}}" alt="" class="img img-thumbnail"></p>
    @endif
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataKasirs.index') !!}" class="btn btn-default">Kembali</a>
</div>
