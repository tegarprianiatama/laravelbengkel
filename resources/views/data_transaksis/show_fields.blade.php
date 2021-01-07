<div class="row">
    <div class="col-md-4 col-sm-4">
        <h4><b>BENGKEL KEMBANG JEPUN MOTOR TULUNGAGUNG</b></h4> 
        <p>Jalan Pahlawan No 326</p>
        <p>Telpon : 0355 - 323532</p>
        <p>Kode Pos : 66226</p>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4>Servis</h4>
        <p>{{$dataTransaksi->created_at}}</p>
        <p>ID : {{$dataTransaksi->ID_DATA_TRANSAKSI}}</p>
        <p>Pegawai : {{$dataTransaksi->dataKasir->NAMA_KASIR}}</p>
    </div>
    <div class="col-md-4 col-sm-4">
        <?php if ($dataTransaksi->dataPelanggan): ?>  
            <h4>Pelanggan</h4>
            <p>{{$dataTransaksi->dataPelanggan->NAMA}}</p>
            <p>{{$dataTransaksi->dataMotorPelanggan->NAMA}}</p>
            <p>{{$dataTransaksi->dataMotorPelanggan->NO_POL}}</p>
            <p>Alamat : {{$dataTransaksi->dataPelanggan->ALAMAT}}</p>
            <p>Telp : {{$dataTransaksi->dataPelanggan->NO_TELP}}</p>
        <?php endif ?>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h3>Detail Penjualan</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Qty</th>
            <th>Diskon</th>
            <th>SubTotal</th>
        </tr>
            
        </thead>
        <tbody>
         <tr>
            <td>0</td>
            <td>--</td>
            <td>@if($dataTransaksi->dataJasaServis)
                {{$dataTransaksi->dataJasaServis->NAMA_JASA}}
                @else
                Hanya Barang
                @endif</td>
            <td class="text-right">0</td>
            <td class="text-right">0</td>
            <td class="text-right">@if($dataTransaksi->dataJasaServis)
                {{numberRp($dataTransaksi->dataJasaServis->HARGA)}}
                @else
                0
                @endif</td>
        </tr>
        @foreach ($dataTransaksi->detailTransaksis as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->dataBarang->KODE_BARANG}}</td>
                <td>{{$item->dataBarang->NAMA_BARANG}}</td>
                <td class="text-right">{{$item->QTY}}</td>
                <td class="text-right">{{$item->DISKON}}</td>
                <td class="text-right">{{ numberRp($item->SUB_TOTAL) }}</td>
            </tr>
        @endforeach
        <tr style="border-top: 2px solid black">
            <td class="text-right">Rincian</td>
            <td class="text-right"> : </td>
            <td></td>
            <td colspan="2" class="text-right">Jumlah Tunai</td>
            <td class="text-right" colspan="2">{{ numberRp($dataTransaksi->TOTAL_BERSIH) }}</td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">Diskon total</td>
            <td class="text-right" colspan="2">{{ numberRp($dataTransaksi->TOTAL_DISKON)}}</td>
        </tr>
        <tr>
            <td class="text-right">Total Bayar</td>
            <td class="text-right">{{ numberRp($dataTransaksi->JUMLAH_BAYAR) }}</td>
            <td></td>
            <td colspan="2" class="text-right">Total Kembalian</td>
            <td class="text-right" colspan="2">{{ numberRp($dataTransaksi->KEMBALIAN) }}</td>
        </tr>            
        </tbody>
    </table>
</div>
</div>