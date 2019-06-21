@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Penjualan Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataPenjualanBarang, ['route' => ['dataPenjualanBarangs.update', $dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN], 'method' => 'patch']) !!}

                        @include('data_penjualan_barangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var i=1
        $('.select-barang').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Barang'
        });
        $('.select-barang').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/data-barang/"+id, function(data, status){
                $('#ID_BARANG').val(data.ID_BARANG);
                $('#KODE_BARANG').val(data.KODE_BARANG);
                $('#NAMA_BARANG').val(data.NAMA_BARANG);
                $('#HARGA_JUAL').val(data.HARGA_JUAL);
            });
            $('#qty').focus();
        });
        $('#btn-tambah').on('click',function(e){
            $('#subtotal').val(parseInt($('#HARGA_JUAL').val())*parseInt($('#qty').val()));
            $("#daftar-penjualan").append('<tr>'+
                '<td>'+i+'</td>'+
                '<td><input type="hidden" readonly class="form-control" name="id_barang[]" value="'+$('#ID_BARANG').val()+'">'+
                '<input type="text" readonly class="form-control" name="kode_barang[]" value="'+$('#KODE_BARANG').val()+'"></td>'+
                '<td><input type="text" readonly class="form-control" name="nama[]" value="'+$('#NAMA_BARANG').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="harga[]" value="'+$('#HARGA_JUAL').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="qty[]" value="'+$('#qty').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></td>'+
            '</tr>');
            i++;
            $('#KODE_BARANG').val('');
            $('#NAMA_BARANG').val('');
            $('#HARGA_JUAL').val('');
            $('#qty').val('');
            $('#subtotal').val('');
            $('.select-barang').val(null).trigger('change');
            var total = 0;
            $(".subtotal").each(function() {
                total += parseInt($(this).val());
            });
            $('#TOTAL').val(total);
            
            e.preventDefault();
        })
    });
</script>
@endsection
