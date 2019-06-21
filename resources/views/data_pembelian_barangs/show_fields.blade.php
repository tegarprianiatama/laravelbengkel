<div class="row">
    <div class="col-md-4 col-sm-4">
        <h4><b>BENGKEL KEMBANG JEPUN MOTOR TULUNGAGUNG</b></h4> 
        <p>Jalan Pahlawan No 326</p>
        <p>Telpon : 0355 - 323532</p>
        <p>Kode Pos : 66226</p>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4>Pembelian</h4>
        <p>{{$dataPembelianBarang->created_at}}</p>
        <p>ID : {{$dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG}} </p>
{{--         <p>Pegawai : {{$dataPembelianBarang->dataKasir->NAMA_KASIR}} </p> --}}
    </div>
    <div class="col-md-4 col-sm-4">
        <?php if ($dataPembelianBarang->dataSupplier): ?>  
            <h4>Supplier</h4>
            <p>{{$dataPembelianBarang->dataSupplier->NAMA_SUPPLIER}}</p>
            <p>Alamat   : {{$dataPembelianBarang->dataSupplier->ALAMAT_SUPPLIER}}</p>
            <p>Cabang   : {{$dataPembelianBarang->dataSupplier->CABANG_SUPPLIER}}</p>
            <p>Telp     : {{$dataPembelianBarang->dataSupplier->NO_TELP_SUPPLIER}}</p>
        <?php endif ?>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h3>Detail Pembelian</h3>
    <table class="table table-bordered">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-2">Kode</th>
            <th class="col-md-3">Nama</th>
            <th class="col-md-1">Qty</th>
            <th class="col-md-1">Diskon</th>
            <th class="col-md-2">SubTotal</th>
        </tr>
        @foreach ($dataPembelianBarang->detailPembelianBarang as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->dataBarang->KODE_BARANG}}</td>
                <td>{{$item->dataBarang->NAMA_BARANG}}</td>
                <td class="text-right">{{$item->QTY}}</td>
                <td class="text-right">{{$item->DISKON}}</td>
                <td class="text-right">{{ numberRp($item->SUBTOTAL) }}</td>
            </tr>
        @endforeach
        <tr style="border-top: 2px solid black">
            <td class="text-right">Rincian</td>
            <td class="text-right"> :{{-- {{ numberRp($dataPembelianBarang->total) }} --}}</td>
            <td></td>
            <td colspan="2" class="text-right">Jumlah Tunai</td>
            <td class="text-right" colspan="2">{{ numberRp($dataPembelianBarang->JUMLAH_BAYAR) }}</td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">Diskon total</td>
            <td class="text-right" colspan="2">{{ numberRp($dataPembelianBarang->DISKON)}}</td>
        </tr>
        <tr>
            <td class="text-right">Total Bayar</td>
            <td class="text-right">{{ numberRp($dataPembelianBarang->TOTAL_BERSIH) }}</td>
            <td></td>
            <td colspan="2" class="text-right">Total Kembalian</td>
            <td class="text-right" colspan="2">{{ numberRp($dataPembelianBarang->KEMBALIAN) }}</td>
        </tr> 
        {{-- <tr>
            <td class="text-right">Jenis Pembayaran</td>
            <td class="text-right">{{$penjualan->jenisbayar}}</td>
            <td></td>
            <td class="text-right" colspan="2">Jatuh Tempo</td>
            <td class="text-right" colspan="2">{{$penjualan->jatuhtempo}}</td>
        </tr> --}}
    </table>
</div>
</div>


{{-- <!-- Id Data Pembelian Barang Field -->
<div class="form-group">
    {!! Form::label('ID_DATA_PEMBELIAN_BARANG', 'Id Data Pembelian Barang:') !!}
    <p>{!! $dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG !!}</p>
</div>

<!-- Id Supplier Field -->
<div class="form-group">
    {!! Form::label('ID_SUPPLIER', 'Id Supplier:') !!}
    <p>{!! $dataPembelianBarang->dataSupplier->NAMA_SUPPLIER !!}</p>
</div>

<!-- Tgl Pembelian Field -->
<div class="form-group">
    {!! Form::label('TGL_PEMBELIAN', 'Tgl Pembelian:') !!}
    <p>{!! date_format($dataPembelianBarang->TGL_PEMBELIAN, 'Y-m-d') !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    <p>{!! $dataPembelianBarang->KETERANGAN !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('TOTAL', 'Total:') !!}
    <p>{!! $dataPembelianBarang->TOTAL !!}</p>
</div>

<!-- Created At Field -->
<!-- <div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $dataPembelianBarang->created_at !!}</p>
</div> -->

<!-- Updated At Field -->
<!-- <div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $dataPembelianBarang->updated_at !!}</p>
</div> -->

<!-- Deleted At Field -->
<!-- <div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $dataPembelianBarang->deleted_at !!}</p>
</div> --> --}}

