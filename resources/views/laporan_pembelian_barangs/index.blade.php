@extends('layouts.app')
​
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Laporan Pembelian Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Pembelian Barang</li>
                    </ol>
                </div>
            </div>
        </div>
​
        <section class="content" id="dw">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            @slot('title')
                            Filter Transaksi
                            @endslot
                            <form action="{{ route('laporan_pembelian_barangs.index') }}" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Mulai Tanggal</label>
                                            <input type="date" name="start_date" 
                                                class="form-control {{ $errors->has('start_date') ? 'is-invalid':'' }}"
                                                id="start_date"
                                                value="{{ request()->get('start_date') }}"
                                                >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sampai Tanggal</label>
                                            <input type="date" name="end_date" 
                                                class="form-control {{ $errors->has('end_date') ? 'is-invalid':'' }}"
                                                id="end_date"
                                                value="{{ request()->get('end_date') }}">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm">Cari</button>
                                        </div>
                                    </div>
​
                            @slot('footer')
​
                            @endslot
                       
                    </div>
                    
                    <div class="col-md-12">
                     
                            @slot('title')
                            Data Transaksi
                            @endslot
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No Nota</th>
                                            <th>Supplier</th>
                                            <th>Tgl Pembelian</th>
                                            <th>Keterangan</th>
                                            <th>Total</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dataPembelianBarangs as $row)
                                        @php 
                                            $totalSemua += $row->TOTAL 
                                        @endphp
                                        <tr>
                                            <td><strong>#{{ $row->ID_DATA_PEMBELIAN_BARANG }}</strong></td>
                                            <td>{{ $row->dataSupplier->NAMA_SUPPLIER }}</td>
                                            <td>{{ $row->TGL_PEMBELIAN }}</td>
                                            <td>{{ $row->KETERANGAN }}</td>
                                            <td>Rp {{ number_format($row->TOTAL) }}</td>
                                            {{-- <td>{{ $row->created_at->format('d-m-Y H:i:s') }}</td> --}}
                                            {{-- <td>
                                                <a href="{{ route('laporan.pdf', $row->ID_DATA_PEMBELIAN_BARANG) }}" 
                                                    target="_blank"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </td> --}}
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="7">Tidak ada data laporan</td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td><b>Total :</b></td>
                                            <td></td><td></td><td></td>
                                            <td><b>{{ numberRp($totalSemua) }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @slot('footer')
​
                            @endslot
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
​
@section('js')
    <script>
        $('#start_date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
​
        $('#end_date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection

