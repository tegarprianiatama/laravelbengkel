<div class="row">
    <div class="col-md-4 col-sm-4">
        <h4><b>BENGKEL KEMBANG JEPUN MOTOR TULUNGAGUNG</b></h4> 
        <p>Jalan Pahlawan No 326</p>
        <p>Telpon : 0355 - 323532</p>
        <p>Kode Pos : 66226</p>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4><b>Penjualan</b></h4>
        <p>{{$dataPenjualanBarang->created_at}}</p>
        <p>ID : {{$dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN}} </p>
        <p>Pegawai : {{$dataPenjualanBarang->dataKasir->NAMA_KASIR}} </p>
    </div>
    <div class="col-md-4 col-sm-4">
        <?php if ($dataPenjualanBarang->dataPelanggan): ?>  
            <h4><b>Pelanggan</b></h4>
            <p>{{$dataPenjualanBarang->dataPelanggan->NAMA}}</p>
            <p>Alamat : {{$dataPenjualanBarang->dataPelanggan->ALAMAT}}</p>
            <p>Telp : {{$dataPenjualanBarang->dataPelanggan->NO_TELP}}</p>
        <?php endif ?>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h3><b>Detail Penjualan</b></h3>
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
                <td>{{$item->QTY}}</td>
                <td>{{$item->DISKON}}</td>
                <td>{{ numberRp($item->SUBTOTAL) }}</td>
            </tr>
        @endforeach
        <tr style="border-top: 2px solid black">
            <td><b>Rincian</b></td>
            <td> : </td>
            <td></td>
            <td colspan="2" class="text-right"><b>Jumlah Tunai</b></td>
            <td colspan="2">{{ numberRp($dataPenjualanBarang->JUMLAH_BAYAR) }}</td>
        </tr>
        <tr>
            <td colspan="5" class="text-right"><b>Diskon total</b></td>
            <td colspan="2">{{ numberRp($dataPenjualanBarang->DISKON)}}</td>
        </tr>
        <tr>
            <td><b>Total Bayar</b></td>
            <td>{{ numberRp($dataPenjualanBarang->TOTAL_BERSIH) }}</td>
            <td></td>
            <td colspan="2" class="text-right"><b>Total Kembalian</b></td>
            <td colspan="2">{{ numberRp($dataPenjualanBarang->KEMBALIAN) }}</td>
        </tr>
    </table>
</div>
</div>