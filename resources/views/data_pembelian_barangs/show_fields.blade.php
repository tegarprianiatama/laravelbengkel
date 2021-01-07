<div class="row">
    <div class="col-md-4 col-sm-4">
        <h4><b>BENGKEL KEMBANG JEPUN MOTOR TULUNGAGUNG</b></h4> 
        <p>Jalan Pahlawan No 326</p>
        <p>Telpon : 0355 - 323532</p>
        <p>Kode Pos : 66226</p>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4><b>Pembelian</b></h4>
        <p>{{$dataPembelianBarang->created_at}}</p>
        <p>ID : {{$dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG}} </p>
    </div>
    <div class="col-md-4 col-sm-4">
        <?php if ($dataPembelianBarang->dataSupplier): ?>  
            <h4><b>Supplier</b></h4>
            <p>{{$dataPembelianBarang->dataSupplier->NAMA_SUPPLIER}}</p>
            <p>Alamat   : {{$dataPembelianBarang->dataSupplier->ALAMAT_SUPPLIER}}</p>
            <p>Cabang   : {{$dataPembelianBarang->dataSupplier->CABANG_SUPPLIER}}</p>
            <p>Telp     : {{$dataPembelianBarang->dataSupplier->NO_TELP_SUPPLIER}}</p>
        <?php endif ?>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h3><b>Detail Pembelian</b></h3>
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
                <td>{{$item->QTY}}</td>
                <td>{{$item->DISKON}}</td>
                <td>{{ numberRp($item->SUBTOTAL) }}</td>
            </tr>
        @endforeach
        <tr style="border-top: 2px solid black">
            <td><b>Rincian</b></td>
            <td> : </td>
            <td></td>
            <td colspan="2"><b>Jumlah Tunai</b></td>
            <td colspan="2">{{ numberRp($dataPembelianBarang->JUMLAH_BAYAR) }}</td>
        </tr>
        <tr>
            <td colspan="5"><b>Diskon total</b></td>
            <td colspan="2">{{ numberRp($dataPembelianBarang->DISKON)}}</td>
        </tr>
        <tr>
            <td><b>Total Bayar</b></td>
            <td>{{ numberRp($dataPembelianBarang->TOTAL_BERSIH) }}</td>
            <td></td>
            <td colspan="2"><b>Total Kembalian</b></td>
            <td colspan="2">{{ numberRp($dataPembelianBarang->KEMBALIAN) }}</td>
        </tr>
    </table>
</div>
</div>
