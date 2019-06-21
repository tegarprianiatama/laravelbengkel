<div class="row">
    <div class="col-md-4 col-sm-4">
        <h4><b>BENGKEL KEMBANG JEPUN MOTOR TULUNGAGUNG</b></h4> 
        <p>Jalan Pahlawan No 326</p>
        <p>Telpon : 0355 - 323532</p>
        <p>Kode Pos : 66226</p>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4>Penjualan</h4>
        <p>{{$dataPenjualanBarang->created_at}}</p>
        <p>ID : {{$dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN}} </p>
        <p>Pegawai : {{$dataPenjualanBarang->dataKasir->NAMA_KASIR}} </p>
    </div>
    <div class="col-md-4 col-sm-4">
        <?php if ($dataPenjualanBarang->dataPelanggan): ?>  
            <h4>Pelanggan</h4>
            <p>{{$dataPenjualanBarang->dataPelanggan->NAMA}}</p>
            <p>Alamat : {{$dataPenjualanBarang->dataPelanggan->ALAMAT}}</p>
            <p>Telp : {{$dataPenjualanBarang->dataPelanggan->NO_TELP}}</p>
        <?php endif ?>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h3>Detail Penjualan</h3>
    <table class="table table-bordered">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-2">Kode</th>
            <th class="col-md-3">Nama</th>
            <th class="col-md-1">Qty</th>
            <th class="col-md-1">Diskon</th>
            <th class="col-md-2">SubTotal</th>
        </tr>
        @foreach ($dataPenjualanBarang->detailPenjualanBarang as $row=>$item)
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
            <td class="text-right"> :{{-- {{ numberRp($dataPenjualanBarang->total) }} --}}</td>
            <td></td>
            <td colspan="2" class="text-right">Jumlah Tunai</td>
            <td class="text-right" colspan="2">{{ numberRp($dataPenjualanBarang->JUMLAH_BAYAR) }}</td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">Diskon total</td>
            <td class="text-right" colspan="2">{{ numberRp($dataPenjualanBarang->DISKON)}}</td>
        </tr>
        <tr>
            <td class="text-right">Total Bayar</td>
            <td class="text-right">{{ numberRp($dataPenjualanBarang->TOTAL_BERSIH) }}</td>
            <td></td>
            <td colspan="2" class="text-right">Total Kembalian</td>
            <td class="text-right" colspan="2">{{ numberRp($dataPenjualanBarang->KEMBALIAN) }}</td>
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


{{-- <!-- Id Transaksi Penjualan Field -->
<div class="form-group">
    {!! Form::label('ID_TRANSAKSI_PENJUALAN', 'Id Transaksi Penjualan:') !!}
    <p>{!! $dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN !!}</p>
</div>

<!-- Id Kasir Field -->
<div class="form-group">
    {!! Form::label('ID_KASIR', 'Id Kasir:') !!}
    <p>{!! $dataPenjualanBarang->ID_KASIR !!}</p>
</div>

<!-- Id Pelanggan Field -->
<div class="form-group">
    {!! Form::label('ID_PELANGGAN', 'Id Pelanggan:') !!}
    <p>{!! $dataPenjualanBarang->ID_PELANGGAN !!}</p>
</div>

<!-- Tgl Penjualan Field -->
<div class="form-group">
    {!! Form::label('TGL_PENJUALAN', 'Tgl Penjualan:') !!}
    <p>{!! $dataPenjualanBarang->TGL_PENJUALAN !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('KETERANGAN', 'Keterangan:') !!}
    <p>{!! $dataPenjualanBarang->KETERANGAN !!}</p>
</div>

<!-- Id Barang Field -->
<!-- <div class="form-group">
    {!! Form::label('ID_BARANG', 'Id Barang:') !!}
    <p>{!! $dataPenjualanBarang->ID_BARANG !!}</p>
</div> -->

<!-- Qty Field -->
<!-- <div class="form-group">
    {!! Form::label('QTY', 'Qty:') !!}
    <p>{!! $dataPenjualanBarang->QTY !!}</p>
</div> -->

<!-- Harga Jual Field -->
<!-- <div class="form-group">
    {!! Form::label('HARGA_JUAL', 'Harga Jual:') !!}
    <p>{!! $dataPenjualanBarang->HARGA_JUAL !!}</p>
</div> -->

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('TOTAL', 'Total:') !!}
    <p>{!! $dataPenjualanBarang->TOTAL !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $dataPenjualanBarang->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $dataPenjualanBarang->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $dataPenjualanBarang->deleted_at !!}</p>
</div>

 --}}