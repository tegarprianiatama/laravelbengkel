<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLaporanPenjualanBarangRequest;
use App\Http\Requests\UpdateLaporanPenjualanBarangRequest;
use App\Repositories\LaporanPenjualanBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;
use App\Models\DataPenjualanBarang;
use App\Models\DataKasir;
use App\Models\DataPelanggan;
use PDF;

class LaporanPenjualanBarangController extends AppBaseController
{
    /** @var  LaporanPenjualanBarangRepository */
    private $laporanPenjualanBarangRepository;

    public function __construct(LaporanPenjualanBarangRepository $laporanPenjualanBarangRepo)
    {
        $this->laporanPenjualanBarangRepository = $laporanPenjualanBarangRepo;
    }

    /**
     * Display a listing of the LaporanPenjualanBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $totalSemua = 0;
        $datakasir = DataKasir::pluck('NAMA_KASIR', 'ID_KASIR');
        $datapelanggan = DataPelanggan::pluck('NAMA','ID_PELANGGAN');
        $dataPenjualanBarangs = DataPenjualanBarang::where('created_at', $request->start_date);

        if (!empty($request->start_date) && !empty($request->end_date)) {
        
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

        $dataPenjualanBarangs = DataPenjualanBarang::whereBetween('TGL_PENJUALAN', [$start_date, $end_date])->get();
        // $dataPenjualanBarangs = DataPenjualanBarang::where('created_at', '>=', $start_date)
                                                   // ->where('created_at', '<=', $end_date)->get();
    } else {
        
        $dataPenjualanBarangs = $dataPenjualanBarangs->take(10)->skip(0)->get();
    }

        $this->laporanPenjualanBarangRepository->pushCriteria(new RequestCriteria($request));
        $laporanPenjualanBarangs = $this->laporanPenjualanBarangRepository->all();

        return view('laporan_penjualan_barangs.index')
            ->with('totalSemua', $totalSemua)
            ->with('dataPenjualanBarangs', $dataPenjualanBarangs)
            ->with('laporanPenjualanBarangs', $laporanPenjualanBarangs);
    }

    /**
     * Show the form for creating a new LaporanPenjualanBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('laporan_penjualan_barangs.create');
    }

    /**
     * Store a newly created LaporanPenjualanBarang in storage.
     *
     * @param CreateLaporanPenjualanBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateLaporanPenjualanBarangRequest $request)
    {
        $input = $request->all();

        $laporanPenjualanBarang = $this->laporanPenjualanBarangRepository->create($input);

        Flash::success('Laporan Penjualan Barang saved successfully.');

        return redirect(route('laporanPenjualanBarangs.index'));
    }

    /**
     * Display the specified LaporanPenjualanBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $laporanPenjualanBarang = $this->laporanPenjualanBarangRepository->findWithoutFail($id);

        if (empty($laporanPenjualanBarang)) {
            Flash::error('Laporan Penjualan Barang not found');

            return redirect(route('laporanPenjualanBarangs.index'));
        }

        return view('laporan_penjualan_barangs.show')->with('laporanPenjualanBarang', $laporanPenjualanBarang);
    }

    /**
     * Show the form for editing the specified LaporanPenjualanBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $laporanPenjualanBarang = $this->laporanPenjualanBarangRepository->findWithoutFail($id);

        if (empty($laporanPenjualanBarang)) {
            Flash::error('Laporan Penjualan Barang not found');

            return redirect(route('laporanPenjualanBarangs.index'));
        }

        return view('laporan_penjualan_barangs.edit')->with('laporanPenjualanBarang', $laporanPenjualanBarang);
    }

    /**
     * Update the specified LaporanPenjualanBarang in storage.
     *
     * @param  int              $id
     * @param UpdateLaporanPenjualanBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLaporanPenjualanBarangRequest $request)
    {
        $laporanPenjualanBarang = $this->laporanPenjualanBarangRepository->findWithoutFail($id);

        if (empty($laporanPenjualanBarang)) {
            Flash::error('Laporan Penjualan Barang not found');

            return redirect(route('laporanPenjualanBarangs.index'));
        }

        $laporanPenjualanBarang = $this->laporanPenjualanBarangRepository->update($request->all(), $id);

        Flash::success('Laporan Penjualan Barang updated successfully.');

        return redirect(route('laporanPenjualanBarangs.index'));
    }

    /**
     * Remove the specified LaporanPenjualanBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $laporanPenjualanBarang = $this->laporanPenjualanBarangRepository->findWithoutFail($id);

        if (empty($laporanPenjualanBarang)) {
            Flash::error('Laporan Penjualan Barang not found');

            return redirect(route('laporanPenjualanBarangs.index'));
        }

        $this->laporanPenjualanBarangRepository->delete($id);

        Flash::success('Laporan Penjualan Barang deleted successfully.');

        return redirect(route('laporanPenjualanBarangs.index'));
    }


    public function print($id) {
        $laporanPenjualanBarang = $this->laporanPenjualanBarangRepository->findWithoutFail($id);
        $id = $laporanPenjualanBarang->id;
        $pdf = PDF::loadView('laporan_penjualan_barangs.print', compact('laporanPenjualanBarang', 'id'))->setPaper('A5', 'potrait');
        return $pdf->stream('laporan.pdf');

        if (empty($laporanPenjualanBarang)) {
            Flash::error('Laporan Penjualan not found');
            return redirect(route('laporan_penjualan_barang.index'));
        }

        return view('laporan_penjualan_barang.print', compact('laporan_penjualan_barang'));
        }
    }
