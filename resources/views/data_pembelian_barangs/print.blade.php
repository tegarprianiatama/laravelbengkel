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
                    <img src="{{public_path('images/jepun.jpeg')}}" style="width: 80%; height: 100%">
                </td>
                <td class="text-right" style="font-size: 12px;">
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
				{{-- <p>Pembelian</p> --}}
				<p>Tanggal Pembelian  : {{$dataPembelianBarang->created_at}}</p>
				<p>Nomer Nota 		: {{$dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG}} </p>
				<!-- <p>Pegawai 			: {{-- {{$dataPenjualanBarang->dataKasir->NAMA_KASIR}} --}} </p> -->
			</td>
			<td style="width: 50%;">
                {{-- <p>Supplier</p> --}}
				<p>Supplier : {{$dataPembelianBarang->dataSupplier->NAMA_SUPPLIER}}</p>
				<p>Alamat 	: {{$dataPembelianBarang->dataSupplier->ALAMAT_SUPPLIER}}</p>
                <p>Cabang   : {{$dataPembelianBarang->dataSupplier->CABANG_SUPPLIER}}</p>
				<p>No Telp 	: {{$dataPembelianBarang->dataSupplier->NO_TELP_SUPPLIER}}</p>
			</td>
		</tr>
	</table>

    <table class="table" style="border: 0px solid black; width: 100%;">
    	<h5><b>Daftar Struk Pembelian</b></h5>
        <tr>
            <th class="col-md-1 text-center">No</th>
            <th class="col-md-2 text-center">Kode Barang</th>
            <th class="col-md-3 text-center">Nama Barang</th>
            <th class="col-md-1 text-center">Qty</th>
            <th class="col-md-2 text-center">Subtotal</th>
        </tr>
        @foreach ($dataPembelianBarang->detailPembelianBarang as $row=>$item)
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
            <td class="text-right"><b>{{$dataPembelianBarang->TOTAL}}</b></td>
        </tr>
        <tr>
            <td></td><td></td><td></td><td></td>
            <td  class="text-left" style="border-top: 2px solid black;">Diskon Total : </td>
            <td class="text-right" style="border-top: 2px solid black;">{{$dataPembelianBarang->DISKON}}</td>
        </tr>
        {{-- <tr>
            <td></td><td></td>
            <td class="text-left"><b>Jenis Pembayaran : {{$pembelian->jenisbayar}}</b></td>
            <td></td>
            <td  class="text-left" style="border-top: 2px solid black;"><b>Total Bayar: </b></td>
            <td style="border-top: 2px solid black;" class="text-right"><b>{{$pembelian->totalbersih}}</b></td>
        </tr> --}}
        <tr>
            <td></td>
            <td class="text-left" style="border-top: 2px solid black;"><b>Jumlah Tunai :</b></td>
            <td style="border-top: 2px solid black;" class="text-right"><b>{{$dataPembelianBarang->JUMLAH_BAYAR}}</b></td>
            <td></td>
            <td class="text-left" style="border-top: 2px solid black;"><b>Kembalian : </b></td>
            <td style="border-top: 2px solid black;" class="text-right"><b>{{$dataPembelianBarang->KEMBALIAN}}</b></td>
        </tr>
    </table>
    <br>
    <footer style="text-align: center;">
    	<p><b>~~ Terima Kasih dan Selamat Berbelanja kembali. ~~</b></p>
    </footer>
</body>
</html>