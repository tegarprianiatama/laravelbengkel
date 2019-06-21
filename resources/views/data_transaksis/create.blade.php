@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Transaksi Servis
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'dataTransaksis.store']) !!}

                        @include('data_transaksis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>

    $(document).ready(function() {
        $('#TOTAL').mask('000.000.000', {reverse: true});
        $('#TOTAL_BERSIH').mask('000.000.000', {reverse: true});
        $('#TOTAL_BARANG').mask('000.000.000', {reverse: true});
        $('#TOTAL_JASA').mask('000.000.000', {reverse: true});
        $('#KEMBALIAN').mask('000.000.000', {reverse: true});
        $('#TOTAL').val(0);
        $('#TOTAL_BARANG').val(0);
        $('#TOTAL_JASA').val(0);

        var i=1
        $('.select-barang').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Barang'
        });
        $('.select-pelanggan').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Pelanggan'
        });
        $('#TGL_PENJUALAN').datepicker({
                autoclose : true,
                format: 'dd/mm/yyyy'
        });
        $('.select-barang').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/data-barang/"+id, function(data, status){
                $('#ID_BARANG').val(data.ID_BARANG);
                $('#KODE_BARANG').val(data.KODE_BARANG);
                $('#NAMA_BARANG').val(data.NAMA_BARANG);
                $('#HARGA_JUAL').val(data.HARGA_JUAL);
                $('#BIAYA_PEMASANGAN').val(data.BIAYA_PEMASANGAN);
                $('#DISKON').val(0);
            });
            $('#qty').focus();
        });
        $('#btn-tambah').on('click',function(e){
            $('#subtotal').val( ( parseInt($('#HARGA_JUAL').val())*parseInt($('#qty').val()) ) - parseInt($('#DISKON').val()) );
            $("#daftar-penjualan").append('<tr>'+
                '<td>'+i+'</td>'+
                '<td><input type="hidden" readonly class="form-control" name="id_barang[]" value="'+$('#ID_BARANG').val()+'">'+
                '<input type="text" readonly class="form-control" name="kode_barang[]" value="'+$('#KODE_BARANG').val()+'"></td>'+
                '<td><input type="text" readonly class="form-control" name="nama[]" value="'+$('#NAMA_BARANG').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="harga[]" value="'+$('#HARGA_JUAL').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="biaya_pemasangan[]" value="'+$('#BIAYA_PEMASANGAN').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control" name="qty[]" value="'+$('#qty').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control subdiskon" name="diskon[]" value="'+$('#DISKON').val()+'"></td>'+
                '<td><input type="text" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></td>'+
            '</tr>');
            i++;
            $('#KODE_BARANG').val('');
            $('#NAMA_BARANG').val('');
            $('#HARGA_JUAL').val('');
            $('#BIAYA_PEMASANGAN').val('');
            $('#qty').val('');
            $('#DISKON').val(0);
            $('#subtotal').val('');
            $('.select-barang').val(null).trigger('change');
            var total = 0;
            var totalDiskon = 0;
            $(".subtotal").each(function() {
                total += parseInt($(this).val());
            });
            $(".subdiskon").each(function() {
                totalDiskon += parseInt($(this).val());
            });
            // a = $('#TOTAL').val();
            // a = parseInt(a) + parseInt(total);
            $('#TOTAL_BARANG').val(total);
            $('#TOTAL_DISKON').val(totalDiskon);
            hitungTotalAll();
            e.preventDefault();
        })

        var j=1
        $('.select-jasa_servis').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Jasa Servis'
        });
        $('.select-jasa_servis').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/data-jasa_servis/"+id, function(data, status){
                $('#NAMA_JASA').val(data.NAMA_JASA);
                $('#HARGA_JASA').val(data.HARGA);
                // $('#BIAYA_TAMBAHAN').val(data.biaya_tambahan);                
                $('#TOTAL_JASA').val(data.HARGA);

                hitungTotalAll();
            });
        });
        // $('#btn-tambah-jasa').on('click',function(e){
        //     $("#daftar-jasa-servis").append('<tr>'+
        //         '<td>'+i+'</td>'+
        //         '<td><input type="text" readonly class="text-right form-control" name="jasa_servis[]" value="'+$('#NAMA_JASA').val()+'"></td>'+
        //         '<td><input type="text" readonly class="text-right form-control harga_jasa" name="harga[]" value="'+$('#HARGA_JASA').val()+'"></td>'+
        //         '<td><input type="text" readonly class="text-right form-control biaya_tambahan" name="biaya_tambahan[]" value="'+$('#BIAYA_TAMBAHAN').val()+'"></td>'+
        //         // '<td><input type="text" readonly class="text-right form-control diskon" name="diskon[]" value="'+$('#DISKON').val()+'"></td>'+
        //     '</tr>');
        //     j++;
        //     $('#HARGA_JASA').val('');
        //     $('#subtotal_jasa_servis').val('');
        //     $('.select-jasa_servis').val(null).triggerr('change');
        //     var totalJasa = 0;
        //     var biayaTambahan = 0;
        //     var diskon = 0;
        //     $(".harga_jasa").each(function() {
        //         totalJasa += parseInt($(this).val());
        //     });
        //     // total = $('#TOTAL').val();
        //     // total = parseInt(total) + parseInt(totalJasa);
        //     $('#TOTAL_JASA').val(totalJasa + biayaTambahan + diskon);
        //     hitungTotalAll();
        //     e.preventDefault();
        // });

        window.hitungTotalAll = function()
        {
            var totalJasa = $('#TOTAL_JASA').val();
            var totalBarang = $('#TOTAL_BARANG').val();
            var totalBiayaTambahan = $('#BIAYA_TAMBAHAN').val();
            var totalDiskon = $('#TOTAL_DISKON').val();

            var totalAll = parseInt(totalJasa) + parseInt(totalBarang) + parseInt(totalBiayaTambahan);
            $('#TOTAL').val(totalAll).trigger('input');
            $('#TOTAL_BERSIH').val( parseInt($('#TOTAL').cleanVal()) - parseInt($('#TOTAL_DISKON').val()) ).trigger('input');
            $('#KEMBALIAN').val(parseInt($('#JUMLAH_BAYAR').val())- parseInt($('#TOTAL_BERSIH').cleanVal()) );
        }
    });

    function create() {
        
        $('#TOTAL_BERSIH').val( parseInt($('#TOTAL').cleanVal()) - parseInt($('#TOTAL_DISKON').val()) ).trigger('input');

    }

    function tambah() {
        $('#KEMBALIAN').val(parseInt($('#JUMLAH_BAYAR').val())- parseInt($('#TOTAL_BERSIH').val()) );

    }
</script>
@endsection