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
				<p>Tanggal Penjualan  : {{$dataTransaksi->created_at}}</p>
				<p>Nomer Nota 		: {{$dataTransaksi->ID_DATA_TRANSAKSI}}</p>
				<p>Pegawai 			: {{$dataTransaksi->dataKasir->NAMA_KASIR}}</p>
			</td>
			<td style="width: 50%;">
				<p>Nama 	: {{$dataTransaksi->dataPelanggan->NAMA}}</p>
                <p>Motor    : {{$dataTransaksi->dataMotorPelanggan->NAMA}}</p>
                <p>No Pol   : {{$dataTransaksi->dataMotorPelanggan->NO_POL}}</p>
				<p>Alamat 	: {{$dataTransaksi->dataPelanggan->ALAMAT}}</p>
				<p>No Telp 	: {{$dataTransaksi->dataPelanggan->NO_TELP}}</p>
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
        <tbody>
         <tr>
            <td>0</td>
            <td>-</td>
            <td>@if($dataTransaksi->dataJasaServis)
                {{$dataTransaksi->dataJasaServis->NAMA_JASA}}
                @else
                Hanya Barang
                @endif</td>
            <td class="text-right"></td>
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
                <td>{{$item->QTY}}</td>
                <td class="text-right">{{numberRp($item->SUB_TOTAL)}}</td>
            </tr>
        @endforeach
        <tr style="border-top: 2px solid black;">
            <td></td><td></td><td></td><td></td>
            <td class="text-left"><b>Total : </b></td>
            <td class="text-right"><b>{{$dataTransaksi->TOTAL}}</b></td>
        </tr>
        <tr>
            <td></td><td></td><td></td><td></td>
            <td  class="text-left" style="border-top: 2px solid black;">Diskon Total : </td>
            <td class="text-right" style="border-top: 2px solid black;">{{$dataTransaksi->TOTAL_DISKON}}</td>
        </tr>
        <tr>
            <td></td>
            <td class="text-left" style="border-top: 2px solid black;"><b>Jumlah Tunai :</b></td>
            <td style="border-top: 2px solid black;" class="text-right"><b>{{$dataTransaksi->JUMLAH_BAYAR}}</b></td>
            <td></td>
            <td class="text-left" style="border-top: 2px solid black;"><b>Kembalian : </b></td>
            <td style="border-top: 2px solid black;" class="text-right"><b>{{$dataTransaksi->KEMBALIAN}}</b></td>
        </tr>
    </table>
    <br>
    <footer style="text-align: center;">
    	<p><b>~~ Terima Kasih dan Selamat Berbelanja kembali. ~~</b></p>
    </footer>
</body>
</html>