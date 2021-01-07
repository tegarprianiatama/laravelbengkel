<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript">
			function rupiah($item){
				$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
				return $hasil_rupiah;
 			}
		</script>
	</head>
<body style="text-align: center; height: 100%; width: 90%; font-size: 7pt; margin: 5px 5px 5px 5px; margin-left: 5%">
	<div class="layout" style="width: 100%">
		<table style="width: 100%">
            <tr>
                <td style="width: 230px; height: 130px">
                    <img src="{{public_path('image/jepun.jpeg')}}" style="width: 80%; height: 100%">
                </td>
                <td class="text-left" style="font-size: 12px;">
                    <h4><b>BENGKEL KEMBANG JEPUN MOTOR TULUNGAGUNG</b></h4>
            		<p>Jalan Pahlawan No 326</p>
            		<p>Telpon : 0355 - 323532</p>
            		<p>Kode Pos : 66226</p>
                </td>
            </tr>
        </table>
	</div>
		
    <br><br>

	<table style="text-align: center; width: 100%">
		<tr>
			<td style="width: 50%">
				{{-- <p>Penjualan</p> --}}
				<p>Tanggal Penjualan  : {{$dataPenjualanBarang->created_at}}</p>
				<p>Nomer Nota 		: {{$dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN}} </p>
				<p>Pegawai 			: {{$dataPenjualanBarang->dataKasir->NAMA_KASIR}} </p>
			</td>
			<td style="width: 50%;">
                {{-- <p>Pelanggan</p> --}}
				{{-- <p>Nama 	: {{$dataPenjualanBarang->dataPelanggan->NAMA}}</p>
				<p>Alamat 	: {{$dataPenjualanBarang->dataPelanggan->ALAMAT}}</p>
				<p>No Telp 	: {{$dataPenjualanBarang->dataPelanggan->NO_TELP}}</p> --}}
			 
                 <?php if ($dataPenjualanBarang->dataPelanggan): ?>  
                    <h4>Pelanggan</h4>
                    <p>{{$dataPenjualanBarang->dataPelanggan->NAMA}}</p>
                    <p>Alamat : {{$dataPenjualanBarang->dataPelanggan->ALAMAT}}</p>
                    <p>Telp : {{$dataPenjualanBarang->dataPelanggan->NO_TELP}}</p>
                <?php endif ?>
            </td>
		</tr>
	</table>

    <table class="table" style="border: 0px solid black; width: 100%;">
    	<h5><b>Daftar Struk Penjualan</b></h5>
        <tr>
            <th class="col-md-1 text-center">No</th>
            <th class="col-md-2 text-center">Kode Barang</th>
            <th class="col-md-3 text-center">Nama Barang</th>
            <th class="col-md-1 text-center">Qty</th>
            <th class="col-md-2 text-center">Subtotal</th>
        </tr>
        @foreach ($dataPenjualanBarang->detailPenjualanBarang as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->dataBarang->KODE_BARANG}}</td>
                <td>{{$item->dataBarang->NAMA_BARANG}}</td>
                <td>{{$item->QTY}}</td>
                {{-- <td>{{$item->diskon}}</td> --}}
                <td class="text-right">{{$item->SUBTOTAL}}</td>
            </tr>
        @endforeach
        <tr style="border-top: 2px solid black;">
            <td></td><td></td><td></td><td></td>
            <td class="text-left"><b>Total : </b></td>
            <td class="text-right"><b>{{$dataPenjualanBarang->TOTAL}}</b></td>
        </tr>
        <tr>
            <td></td><td></td><td></td><td></td>
            <td  class="text-left" style="border-top: 2px solid black;">Diskon Total : </td>
            <td class="text-right" style="border-top: 2px solid black;">{{$dataPenjualanBarang->DISKON}}</td>
        </tr>
        {{-- <tr>
            <td></td><td></td>
            <td class="text-left"><b>Jenis Pembayaran : {{$penjualan->jenisbayar}}</b></td>
            <td></td>
            <td  class="text-left" style="border-top: 2px solid black;"><b>Total Bayar: </b></td>
            <td style="border-top: 2px solid black;" class="text-right"><b>{{$penjualan->totalbersih}}</b></td>
        </tr> --}}
        <tr>
            <td></td>
            <td class="text-left" style="border-top: 2px solid black;"><b>Jumlah Tunai :</b></td>
            <td style="border-top: 2px solid black;" class="text-right"><b>{{$dataPenjualanBarang->JUMLAH_BAYAR}}</b></td>
            <td></td>
            <td class="text-left" style="border-top: 2px solid black;"><b>Kembalian : </b></td>
            <td style="border-top: 2px solid black;" class="text-right"><b>{{$dataPenjualanBarang->KEMBALIAN}}</b></td>
        </tr>
    </table>
    <br>
    <footer style="text-align: center;">
    	<p><b>~~ Terima Kasih dan Selamat Berbelanja kembali. ~~</b></p>
    </footer>
</body>
</html>