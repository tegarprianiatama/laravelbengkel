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
                    {!! Form::open(['route' => 'dataPembelianBarangs.store']) !!}

                        @include('data_pembelian_barangs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    document.getElementById("MyButton").onclick = function() {
        window.open(
            'http://localhost:8000/dataBarangs/create',
            '_blank'
            );
    };
</script>
<script>
    $(document).ready(function() {
        var i=1;
        var total = 0;

        $('#TOTAL_BERSIH').mask('000.000.000', {reverse: true});

        $('.select-barang').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Barang'
        });
         $('#btn-refresh').click(function(){
          $('.select-barang').empty().trigger("change");
          var barangDropDown = $('.select-barang');
          $.ajax({
              type: 'GET',
              url: '{{route('get-barang')}}'
          }).then(function (data) {
              console.log(data)
              var option = new Option(data.nama, data.id, true, true);
              barangDropDown.append(option).trigger('change');

              for (var k in data) {
                  var option = new Option(data[k].kode + ' ' + data[k].nama, data[k].id, true, true);
                  barangDropDown.append(option).trigger('change');
              }
              $('.select-barang').val(null).trigger('change');
          });
        });
        $('.select-supplier').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Supplier'
        });
        $('.select-barang').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/data-barang/"+id, function(data, status){
                $('#ID_BARANG').val(data.ID_BARANG);
                $('#KODE_BARANG').val(data.KODE_BARANG);
                $('#NAMA_BARANG').val(data.NAMA_BARANG);
                $('#HARGA_MODAL').val(data.HARGA_MODAL);
            });
            $('#qty').focus();

             if ($('#HARGA_BARU').val()=='') {
                $('#HARGA_BARU').val(0);
            };
        });
        $('#btn-tambah').on('click',function(e){
            var hargaOke = 0;
            if ($('#HARGA_BARU').val() == 0) {
                hargaOke = $('#HARGA_MODAL').val();
            }else{
                hargaOke = $('#HARGA_BARU').val();
            }
            $('#subtotal').val(parseInt(hargaOke)*parseInt($('#qty').val()));
            $("#daftar-pembelian").append('<tr class="sub-'+i+'">'+
                '<td>'+i+'</td>'+
                '<td><input type="hidden" readonly class="form-control" name="id_barang[]" value="'+$('#ID_BARANG').val()+'">'+
                '<input type="text" readonly class="form-control" name="kode_barang[]" value="'+$('#KODE_BARANG').val()+'"></td>'+
                '<td><input type="text" readonly class="form-control" name="nama[]" value="'+$('#NAMA_BARANG').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="harga_modal[]" value="'+$('#HARGA_MODAL').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="harga_baru[]" value="'+$('#HARGA_BARU').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="qty[]" value="'+$('#qty').val()+'"></td>'+
                '<td><input type="text" readonly id="subtotal-'+i+'" class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></td>'+
                '<td class="col-md-1 "><button type="button" onclick="deleteColumn(\''+i+'\')" class="glyphicon glyphicon-trash btn btn-danger btn-xs"></td>'+
            '</tr>');
            i++;
            $('#KODE_BARANG').val('');
            $('#NAMA_BARANG').val('');
            $('#HARGA_MODAL').val('');
            $('#HARGA_BARU').val('');
            $('#qty').val('');
            $('#subtotal').val('');
            $('.select-barang').val(null).trigger('change');
            total = 0;
            $(".subtotal").each(function() {
                total += parseInt($(this).val());
            });
            $('#TOTAL').val(total);
            
            e.preventDefault();

            create();
            tambah();
        });

        window.deleteColumn = function(i) {
            var subtotal = parseInt($('tr.sub-'+i+' td input.subtotal').val());
            total = total - subtotal;
            $('#TOTAL').val(total);            
            $('.sub-'+i).remove();
        }

        $('#JUMLAH_BAYAR').on('change', function(e){
            create();
            tambah();
        });

        $('#DISKON').on('change', function(e){
            create();
            tambah();
        });
    });

    // $('#btn-bayar').on('click',function(e){
    //         // var totalbayar = parseInt($('.total').val()) - parseInt($('#diskon_keseluruhan').val());
    //         // $('#total_bayar').val(totalbayar);
    //         // var hargaTtl = parseInt($('.TOTAL').val());
    //         var diskonTtl = hargaTtl * parseInt($('#DISKON').val()) /100;
    //         var totalbayar = hargaTtl - diskonTtl;
    //         $('#TOTAL_BAYAR').val(totalbayar);
    //     });

    //     $("#bayar").on("change", function(e) {
    //        var kembalian = parseInt(e.target.value) - parseInt($('#TOTAL_BAYAR').val());
    //        $('#KEMBALIAN').val(parseInt(KEMBALIAN));
    //    });

     function create() {
        
        $('#TOTAL_BERSIH').val( parseInt($('#TOTAL').val()) - parseInt($('#DISKON').val()) ).trigger('input');

    }

    function tambah() {
        $('#KEMBALIAN').val(parseInt($('#JUMLAH_BAYAR').val())- parseInt($('#TOTAL_BERSIH').cleanVal()) );

    }
</script>
@endsection
