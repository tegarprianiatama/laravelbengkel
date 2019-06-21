<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataTransaksiRequest;
use App\Http\Requests\UpdateDataTransaksiRequest;
use App\Repositories\DataTransaksiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DataPelanggan;
use App\Models\DataBarang;
use App\Models\DataKasir;
use App\Models\DataMekanik;
use App\Models\DataTransaksi;
use App\Models\DataJasaServis;
use App\Models\DataMotorPelanggan;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use PDF;

class DataTransaksiController extends AppBaseController
{
    /** @var  DataTransaksiRepository */
    private $dataTransaksiRepository;

    public function __construct(DataTransaksiRepository $dataTransaksiRepo)
    {
        $this->dataTransaksiRepository = $dataTransaksiRepo;
    }

    /**
     * Display a listing of the DataTransaksi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->dataTransaksiRepository->pushCriteria(new RequestCriteria($request));
        // $dataTransaksis = $this->dataTransaksiRepository->all();
        if ($request->ajax()) {
            // $dataTransaksis = $this->dataTransaksiRepository->with(['dataPelanggan','dataKasir','dataMekanik','dataMotorPelanggan','dataJasaServis',])->all();
            $dataTransaksis = DataTransaksi::orderBy('created_at', 'desc')->with(['dataPelanggan','dataKasir','dataMekanik','dataMotorPelanggan','dataJasaServis'])->get();
            return DataTables::of($dataTransaksis)
                ->addColumn('action', 'data_transaksis.datatables_actions')
                ->addIndexColumn()
                ->editColumn('TGL_PENJUALAN', function ($dataTransaksi) {
                    return $dataTransaksi->TGL_PENJUALAN ? with(new Carbon($dataTransaksi->TGL_PENJUALAN))->format('m/d/Y') : '';
                })
                ->addColumn('NAMA_JASA', function ($dataTransaksi) {
                    if (!empty($dataTransaksi->dataJasaServis)) {
                        return $dataTransaksi->dataJasaServis->NAMA_JASA;

                    } else {
                        return 'Pembelian Barang + Pemasangan';
                    }
                })
                // ->filterColumn('TGL_PENJUALAN', function ($query, $keyword) {
                //     $query->whereRaw("DATE_FORMAT(TGL_PENJUALAN,'%m/%d/%Y') like ?", ["%$keyword%"]);
                // })
                ->make(true);

            }

        return view('data_transaksis.index');
    }

    /**
     * Show the form for creating a new DataTransaksi.
     *
     * @return Response
     */
    public function create()
    {
        $datapelanggan = DataPelanggan::pluck('NAMA','ID_PELANGGAN');
        $databarang = DataBarang::pluck('NAMA_BARANG','ID_BARANG');
        $datakasir = DataKasir::pluck('NAMA_KASIR', 'ID_KASIR');
        $datamekanik = DataMekanik::pluck('NAMA_MEKANIK', 'ID_MEKANIK');
        $datamotorpelanggan = DataMotorPelanggan::pluck('NAMA', 'ID_DETAIL_MOTOR');
        $datajasaservis = DataJasaServis::pluck('NAMA_JASA', 'ID_JASA_SERVIS');
        return view('data_transaksis.create')->with(['datakasir' => $datakasir, 'datamekanik' => $datamekanik, 'datapelanggan' => $datapelanggan,'databarang' => $databarang, 'datamotorpelanggan' => $datamotorpelanggan, 'datajasaservis' => $datajasaservis]);
    }

    /**
     * Store a newly created DataTransaksi in storage.
     *
     * @param CreateDataTransaksiRequest $request
     *
     * @return Response
     */
    public function store(CreateDataTransaksiRequest $request)
    {

         DB::beginTransaction();
        try {
            $input = $request->all();
            $input['TOTAL'] = str_replace('.','', $input['TOTAL']);
            $input['TOTAL_BERSIH'] = str_replace('.','', $input['TOTAL_BERSIH']);
            $dataTransaksi = $this->dataTransaksiRepository->create($input);
            if ($input['_id_barang'] != null) {
                foreach ($input['id_barang'] as $key => $row) {
                    $detail_transaksi = new \App\Models\DetailTransaksi();
                    $barang = DataBarang::where('ID_BARANG', $input['id_barang'][$key])->first();
                    $detail_transaksi->ID_DATA_TRANSAKSI = $dataTransaksi->ID_DATA_TRANSAKSI;
                    $detail_transaksi->ID_BARANG = $barang->ID_BARANG;
                    $detail_transaksi->QTY = $input['qty'][$key];
                    $detail_transaksi->DISKON = $input['diskon'][$key];
                    $detail_transaksi->SUB_TOTAL = $input['subtotal'][$key];
                    $detail_transaksi->save();
                    $new_stok = (int)$barang->STOK - (int)$input['qty'][$key];
                    $barang->STOK = $new_stok;
                    $barang->save();
            }
            }
            $result = $dataTransaksi->ID_DATA_TRANSAKSI;
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        Flash::success('Data Transaksi saved successfully.');

        // return redirect(route('dataTransaksis.index'));
        return redirect(route('dataTransaksis.show', ['dataTransaksi' => $result]));
    }

    /**
     * Display the specified DataTransaksi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $dataTransaksi = $this->dataTransaksiRepository->with('detailTransaksi')->findWithoutFail($id);
        $dataTransaksi = DataTransaksi::with(['detailTransaksis','dataPelanggan','dataKasir','dataMekanik','dataMotorPelanggan','dataJasaServis'])->where('ID_DATA_TRANSAKSI', $id)->first();

        if (empty($dataTransaksi)) {
            Flash::error('Data Transaksi not found');

            return redirect(route('dataTransaksis.index'));
        }

        return view('data_transaksis.show')->with(['dataTransaksi' => $dataTransaksi]);
    }

    /**
     * Show the form for editing the specified DataTransaksi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataTransaksi = $this->dataTransaksiRepository->findWithoutFail($id);

        if (empty($dataTransaksi)) {
            Flash::error('Data Transaksi not found');

            return redirect(route('dataTransaksis.index'));
        }

        return view('data_transaksis.edit')->with('dataTransaksi', $dataTransaksi);
    }

    /**
     * Update the specified DataTransaksi in storage.
     *
     * @param  int              $id
     * @param UpdateDataTransaksiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataTransaksiRequest $request)
    {
        $dataTransaksi = $this->dataTransaksiRepository->findWithoutFail($id);

        if (empty($dataTransaksi)) {
            Flash::error('Data Transaksi not found');

            return redirect(route('dataTransaksis.index'));
        }

        $dataTransaksi = $this->dataTransaksiRepository->update($request->all(), $id);

        Flash::success('Data Transaksi updated successfully.');

        return redirect(route('dataTransaksis.index'));
    }

    /**
     * Remove the specified DataTransaksi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataTransaksi = $this->dataTransaksiRepository->findWithoutFail($id);

        if (empty($dataTransaksi)) {
            Flash::error('Data Transaksi not found');

            return redirect(route('dataTransaksis.index'));
        }

        $this->dataTransaksiRepository->delete($id);

        Flash::success('Data Transaksi deleted successfully.');

        return redirect(route('dataTransaksis.index'));
    }

    public function find($id) {
        return DataJasaServis::find($id);
    }
    public function print($id) {
        $dataTransaksi = DataTransaksi::with(['detailTransaksis','dataPelanggan','dataKasir','dataMekanik','dataMotorPelanggan','dataJasaServis'])->where('ID_DATA_TRANSAKSI', $id)->first();
   
        $id = $dataTransaksi->ID_DATA_TRANSAKSI;
        $pdf = PDF::loadView('data_transaksis.print', compact('dataTransaksi', 'id'))->setPaper('A5', 'potrait');
        return $pdf->stream('invoice.pdf');

        if (empty($dataTransaksi)) {
            Flash::error('Penjualan not found');
            return redirect(route('data_transaksi.index'));
        }

        return view('data_transaksi.print', compact('data_transaksi'));
    }
}
