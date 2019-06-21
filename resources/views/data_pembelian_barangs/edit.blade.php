@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Pembelian Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataPembelianBarang, ['route' => ['dataPembelianBarangs.update', $dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG], 'method' => 'patch']) !!}

                        @include('data_pembelian_barangs.fields')

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
                $('#NAMA_BARANG').val(data.NAMA_BARANG);
                $('#HARGA_MODAL').val(data.HARGA_MODAL);
            });
            $('#qty').focus();
        });
        $('#btn-tambah').on('click',function(e){
            $('#subtotal').val(parseInt($('#HARGA_MODAL').val())*parseInt($('#qty').val()));
            $("#daftar-penjualan").append('<tr>'+
                '<td>'+i+'</td>'+
                '<td><input type="hidden" readonly class="form-control" name="id_barang[]" value="'+$('#ID_BARANG').val()+'">'+
                '<input type="text" readonly class="form-control" name="nama[]" value="'+$('#NAMA_BARANG').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="harga[]" value="'+$('#HARGA_MODAL').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="qty[]" value="'+$('#qty').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></td>'+
                '<td>'+'buton delet'+'</td>'+
            '</tr>');
            i++;
            $('#NAMA_BARANG').val('');
            $('#HARGA_MODAL').val('');
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
