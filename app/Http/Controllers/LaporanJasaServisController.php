<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLaporanJasaServisRequest;
use App\Http\Requests\UpdateLaporanJasaServisRequest;
use App\Repositories\LaporanJasaServisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;
use App\Models\DataTransaksi;
use App\Models\DataKasir;
use App\Models\DataPelanggan;
use App\Models\DataMekanik;
use App\Models\DataMotorPelanggan;
use App\Models\DataJasaServis;
use PDF;

class LaporanJasaServisController extends AppBaseController
{
    /** @var  LaporanJasaServisRepository */
    private $laporanJasaServisRepository;

    public function __construct(LaporanJasaServisRepository $laporanJasaServisRepo)
    {
        $this->laporanJasaServisRepository = $laporanJasaServisRepo;
    }

    /**
     * Display a listing of the LaporanJasaServis.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $totalSemua = 0;
        $datapelanggan = DataPelanggan::pluck('NAMA', 'ID_PELANGGAN');
        $datakasir = DataKasir::pluck('NAMA_KASIR', 'ID_KASIR');
        $datamekanik = DataMekanik::pluck('NAMA_MEKANIK', 'ID_MEKANIK');
        $datamotorpelanggan = DataMotorPelanggan::pluck('NAMA', 'ID_DETAIL_MOTOR');
        $datajasaservis = DataJasaServis::pluck('NAMA_JASA', 'ID_JASA_SERVIS');
        $dataTransaksis = DataTransaksi::where('created_at', $request->start_date);

        if (!empty($request->start_date) && !empty($request->end_date)) {
        
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

        $dataTransaksis = DataTransaksi::whereBetween('TGL_PENJUALAN', [$start_date, $end_date])->get();
        // $dataPenjualanBarangs = DataPenjualanBarang::where('created_at', '>=', $start_date)
                                                   // ->where('created_at', '<=', $end_date)->get();
    } else {
        
        $dataTransaksis = $dataTransaksis->take(10)->skip(0)->get();
    }

        $this->laporanJasaServisRepository->pushCriteria(new RequestCriteria($request));
        $laporanJasaServis = $this->laporanJasaServisRepository->all();

        // return dd($dataJasaServis);

        return view('laporan_jasa_servis.index')
            ->with('totalSemua', $totalSemua)
            ->with('dataTransaksis', $dataTransaksis)
            // ->with('dataJasaServis', $dataJasaServis)
            ->with('laporanJasaServis', $laporanJasaServis);
    }

    /**
     * Show the form for creating a new LaporanJasaServis.
     *
     * @return Response
     */
    public function create()
    {
        return view('laporan_jasa_servis.create');
    }

    /**
     * Store a newly created LaporanJasaServis in storage.
     *
     * @param CreateLaporanJasaServisRequest $request
     *
     * @return Response
     */
    public function store(CreateLaporanJasaServisRequest $request)
    {
        $input = $request->all();

        $laporanJasaServis = $this->laporanJasaServisRepository->create($input);

        Flash::success('Laporan Jasa Servis saved successfully.');

        return redirect(route('laporanJasaServis.index'));
    }

    /**
     * Display the specified LaporanJasaServis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $laporanJasaServis = $this->laporanJasaServisRepository->findWithoutFail($id);

        if (empty($laporanJasaServis)) {
            Flash::error('Laporan Jasa Servis not found');

            return redirect(route('laporanJasaServis.index'));
        }

        return view('laporan_jasa_servis.show')->with('laporanJasaServis', $laporanJasaServis);
    }

    /**
     * Show the form for editing the specified LaporanJasaServis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $laporanJasaServis = $this->laporanJasaServisRepository->findWithoutFail($id);

        if (empty($laporanJasaServis)) {
            Flash::error('Laporan Jasa Servis not found');

            return redirect(route('laporanJasaServis.index'));
        }

        return view('laporan_jasa_servis.edit')->with('laporanJasaServis', $laporanJasaServis);
    }

    /**
     * Update the specified LaporanJasaServis in storage.
     *
     * @param  int              $id
     * @param UpdateLaporanJasaServisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLaporanJasaServisRequest $request)
    {
        $laporanJasaServis = $this->laporanJasaServisRepository->findWithoutFail($id);

        if (empty($laporanJasaServis)) {
            Flash::error('Laporan Jasa Servis not found');

            return redirect(route('laporanJasaServis.index'));
        }

        $laporanJasaServis = $this->laporanJasaServisRepository->update($request->all(), $id);

        Flash::success('Laporan Jasa Servis updated successfully.');

        return redirect(route('laporanJasaServis.index'));
    }

    /**
     * Remove the specified LaporanJasaServis from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $laporanJasaServis = $this->laporanJasaServisRepository->findWithoutFail($id);

        if (empty($laporanJasaServis)) {
            Flash::error('Laporan Jasa Servis not found');

            return redirect(route('laporanJasaServis.index'));
        }

        $this->laporanJasaServisRepository->delete($id);

        Flash::success('Laporan Jasa Servis deleted successfully.');

        return redirect(route('laporanJasaServis.index'));
    }
}
