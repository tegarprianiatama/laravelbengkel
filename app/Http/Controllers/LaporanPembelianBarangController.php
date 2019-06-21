<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLaporanPembelianBarangRequest;
use App\Http\Requests\UpdateLaporanPembelianBarangRequest;
use App\Repositories\LaporanPembelianBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;
use App\Models\DataPembelianBarang;
use App\Models\DataSupplier;
use PDF;

class LaporanPembelianBarangController extends AppBaseController
{
    /** @var  LaporanPembelianBarangRepository */
    private $laporanPembelianBarangRepository;

    public function __construct(LaporanPembelianBarangRepository $laporanPembelianBarangRepo)
    {
        $this->laporanPembelianBarangRepository = $laporanPembelianBarangRepo;
    }

    /**
     * Display a listing of the LaporanPembelianBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $totalSemua = 0;
        $datasupplier = DataSupplier::pluck('NAMA_SUPPLIER', 'ID_SUPPLIER');
        $dataPembelianBarangs = DataPembelianBarang::where('created_at', $request->start_date);

        if (!empty($request->start_date) && !empty($request->end_date)) {
        
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

        $dataPembelianBarangs = DataPembelianBarang::whereBetween('TGL_PEMBELIAN', [$start_date, $end_date])->get();
        // $dataPenjualanBarangs = DataPenjualanBarang::where('created_at', '>=', $start_date)
                                                   // ->where('created_at', '<=', $end_date)->get();
    } else {
        
        $dataPembelianBarangs = $dataPembelianBarangs->take(10)->skip(0)->get();
    }

        $this->laporanPembelianBarangRepository->pushCriteria(new RequestCriteria($request));
        $laporanPembelianBarangs = $this->laporanPembelianBarangRepository->all();

        return view('laporan_pembelian_barangs.index')
            ->with('totalSemua', $totalSemua)
            ->with('dataPembelianBarangs', $dataPembelianBarangs)
            ->with('laporanPembelianBarangs', $laporanPembelianBarangs);
    }

    /**
     * Show the form for creating a new LaporanPembelianBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('laporan_pembelian_barangs.create');
    }

    /**
     * Store a newly created LaporanPembelianBarang in storage.
     *
     * @param CreateLaporanPembelianBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateLaporanPembelianBarangRequest $request)
    {
        $input = $request->all();

        $laporanPembelianBarang = $this->laporanPembelianBarangRepository->create($input);

        Flash::success('Laporan Pembelian Barang saved successfully.');

        return redirect(route('laporanPembelianBarangs.index'));
    }

    /**
     * Display the specified LaporanPembelianBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $laporanPembelianBarang = $this->laporanPembelianBarangRepository->findWithoutFail($id);

        if (empty($laporanPembelianBarang)) {
            Flash::error('Laporan Pembelian Barang not found');

            return redirect(route('laporanPembelianBarangs.index'));
        }

        return view('laporan_pembelian_barangs.show')->with('laporanPembelianBarang', $laporanPembelianBarang);
    }

    /**
     * Show the form for editing the specified LaporanPembelianBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $laporanPembelianBarang = $this->laporanPembelianBarangRepository->findWithoutFail($id);

        if (empty($laporanPembelianBarang)) {
            Flash::error('Laporan Pembelian Barang not found');

            return redirect(route('laporanPembelianBarangs.index'));
        }

        return view('laporan_pembelian_barangs.edit')->with('laporanPembelianBarang', $laporanPembelianBarang);
    }

    /**
     * Update the specified LaporanPembelianBarang in storage.
     *
     * @param  int              $id
     * @param UpdateLaporanPembelianBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLaporanPembelianBarangRequest $request)
    {
        $laporanPembelianBarang = $this->laporanPembelianBarangRepository->findWithoutFail($id);

        if (empty($laporanPembelianBarang)) {
            Flash::error('Laporan Pembelian Barang not found');

            return redirect(route('laporanPembelianBarangs.index'));
        }

        $laporanPembelianBarang = $this->laporanPembelianBarangRepository->update($request->all(), $id);

        Flash::success('Laporan Pembelian Barang updated successfully.');

        return redirect(route('laporanPembelianBarangs.index'));
    }

    /**
     * Remove the specified LaporanPembelianBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $laporanPembelianBarang = $this->laporanPembelianBarangRepository->findWithoutFail($id);

        if (empty($laporanPembelianBarang)) {
            Flash::error('Laporan Pembelian Barang not found');

            return redirect(route('laporanPembelianBarangs.index'));
        }

        $this->laporanPembelianBarangRepository->delete($id);

        Flash::success('Laporan Pembelian Barang deleted successfully.');

        return redirect(route('laporanPembelianBarangs.index'));
    }

    public function print($id) {
        $laporanPembelianBarang = $this->laporanPembelianBarangRepository->findWithoutFail($id);
        $id = $laporanPembelianBarang->id;
        $pdf = PDF::loadView('laporan_pembelian_barangs.print', compact('laporanPembelianBarang', 'id'))->setPaper('A5', 'potrait');
        return $pdf->stream('laporan.pdf');

        if (empty($laporanPembelianBarang)) {
            Flash::error('Laporan Pembelian not found');
            return redirect(route('laporan_pembelian_barang.index'));
        }

        return view('laporan_pembelian_barang.print', compact('laporan_pembelian_barang'));
        }
    }
