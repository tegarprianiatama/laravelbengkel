<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataPenjualanBarangRequest;
use App\Http\Requests\UpdateDataPenjualanBarangRequest;
use App\Repositories\DataPenjualanBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DataKasir;
use App\Models\DataPelanggan;
use App\Models\DataBarang;
use App\Models\DataPenjualanBarang;
use DB;
use Yajra\Datatables\Datatables;
use PDF;
use Dompdf\Dompdf;
use Carbon\Carbon;

class DataPenjualanBarangController extends AppBaseController
{
    /** @var  DataPenjualanBarangRepository */
    private $dataPenjualanBarangRepository;

    public function __construct(DataPenjualanBarangRepository $dataPenjualanBarangRepo)
    {
        $this->dataPenjualanBarangRepository = $dataPenjualanBarangRepo;
    }

    /**
     * Display a listing of the DataPenjualanBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->dataPenjualanBarangRepository->pushCriteria(new RequestCriteria($request));
        // $dataPenjualanBarangs = $this->dataPenjualanBarangRepository->all();

        if ($request->ajax()) {
            // $dataPenjualanBarangs = DataPenjualanBarang::with('DataKasir')->select(['ID_KASIR']);
            $dataPenjualanBarangs = DataPenjualanBarang::orderBy('created_at', 'desc')->with(['dataKasir','dataPelanggan'])->get();
            return DataTables::of($dataPenjualanBarangs)
                ->addColumn('action', 'data_penjualan_barangs.datatables_actions')
                ->addIndexColumn()
                ->editColumn('TGL_PENJUALAN', function ($dataPenjualanBarang) {
                    return $dataPenjualanBarang->TGL_PENJUALAN ? with(new Carbon($dataPenjualanBarang->TGL_PENJUALAN))->format('m/d/Y') : '';
                })
                ->editColumn('data_pelanggan.NAMA', function($dataPenjualanBarang){
                    return $dataPenjualanBarang->dataPelanggan ? $dataPenjualanBarang->dataPelanggan->NAMA : ' ';
                })
                ->make();
        }

        return view('data_penjualan_barangs.index');
    }

    /**
     * Show the form for creating a new DataPenjualanBarang.
     *
     * @return Response
     */
    public function create()
    {
        $datakasir = DataKasir::pluck('NAMA_KASIR', 'ID_KASIR');
        $datapelanggan = DataPelanggan::pluck('NAMA','ID_PELANGGAN');
        $databarang = DataBarang::pluck('NAMA_BARANG','ID_BARANG');
        return view('data_penjualan_barangs.create')->with(['datakasir' => $datakasir,'datapelanggan' => $datapelanggan,'databarang' => $databarang]);
    }

    /**
     * Store a newly created DataPenjualanBarang in storage.
     *
     * @param CreateDataPenjualanBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateDataPenjualanBarangRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['TOTAL_BERSIH'] = str_replace('.','', $input['TOTAL_BERSIH']);
            $dataPenjualanBarang = $this->dataPenjualanBarangRepository->create($input);
            foreach ($input['id_barang'] as $key => $row) {
                $detail_penjualan_barang = new \App\Models\Detail_Penjualan_Barang();
                $barang = DataBarang::where('ID_BARANG', $input['id_barang'][$key])->first();
                $detail_penjualan_barang->ID_TRANSAKSI_PENJUALAN = $dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN;
                $detail_penjualan_barang->ID_BARANG = $barang->ID_BARANG;
                $detail_penjualan_barang->QTY = $input['qty'][$key];
                $detail_penjualan_barang->HARGA_JUAL = $input['harga'][$key];
                $detail_penjualan_barang->SUBTOTAL = $input['subtotal'][$key];
                $detail_penjualan_barang->save();
                $new_stok = (int)$barang->STOK - (int)$input['qty'][$key];
                if ($new_stok<0) {
                    Flash::error('Barang Habis');
                    DB::rollBack();
                    return redirect(route('dataPenjualanBarangs.create'));
                }
                else {
                    $barang->STOK = $new_stok;
                    $barang->save();    
                    $result = $dataPenjualanBarang->id;
                    DB::commit();
                    Flash::success('Data Penjualan Barang saved successfully.');
                    return redirect(route('dataPenjualanBarangs.index'));
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
        } 
    }

    /**
     * Display the specified DataPenjualanBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $dataPenjualanBarang = $this->dataPenjualanBarangRepository->findWithoutFail($id);
        $dataPenjualanBarang = $this->dataPenjualanBarangRepository->with('detailPenjualanBarang')->findWithoutFail($id);
        // dd($dataPenjualanBarang);

        if (empty($dataPenjualanBarang)) {
            Flash::error('Data Penjualan Barang not found');

            return redirect(route('dataPenjualanBarangs.index'));
        }

        return view('data_penjualan_barangs.show')->with('dataPenjualanBarang', $dataPenjualanBarang);
    }

    /**
     * Show the form for editing the specified DataPenjualanBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataPenjualanBarang = $this->dataPenjualanBarangRepository->with('detailPenjualanBarang')->findWithoutFail($id);
        $datakasir = DataKasir::pluck('NAMA_KASIR', 'ID_KASIR');
        $datapelanggan = DataPelanggan::pluck('NAMA','ID_PELANGGAN');
        $databarang = DataBarang::all()->pluck('ID_BARANG');

        if (empty($dataPenjualanBarang)) {
            Flash::error('Data Penjualan Barang not found');

            return redirect(route('dataPenjualanBarangs.index'));
        }

        return view('data_penjualan_barangs.edit')->with(['dataPenjualanBarang' => $dataPenjualanBarang, 'datakasir' => $datakasir, 'datapelanggan' => $datapelanggan, 'databarang' => $databarang]);
    }

    /**
     * Update the specified DataPenjualanBarang in storage.
     *
     * @param  int              $id
     * @param UpdateDataPenjualanBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataPenjualanBarangRequest $request)
    {
        $dataPenjualanBarang = $this->dataPenjualanBarangRepository->findWithoutFail($id);

        if (empty($dataPenjualanBarang)) {
            Flash::error('Data Penjualan Barang not found');

            return redirect(route('dataPenjualanBarangs.index'));
        }

        $dataPenjualanBarang = $this->dataPenjualanBarangRepository->update($request->all(), $id);

        Flash::success('Data Penjualan Barang updated successfully.');

        return redirect(route('dataPenjualanBarangs.index'));
    }

    /**
     * Remove the specified DataPenjualanBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataPenjualanBarang = $this->dataPenjualanBarangRepository->findWithoutFail($id);

        if (empty($dataPenjualanBarang)) {
            Flash::error('Data Penjualan Barang not found');

            return redirect(route('dataPenjualanBarangs.index'));
        }

        $this->dataPenjualanBarangRepository->delete($id);

        Flash::success('Data Penjualan Barang deleted successfully.');

        return redirect(route('dataPenjualanBarangs.index'));
    }

    // public function printnota($id) {
    //     $dataPenjualanBarang = $this->dataPenjualanBarangRepository->findWithoutFail($id);

    //     if (empty($dataPenjualanBarang)) {
    //         Flash::error('Penjualan not found');
    //         return redirect(route('data_penjualan_barang.index'));
    //     }

    //     return view('data_penjualan_barang.printnota', compact('data_penjualan_barang'));
    // }

    public function print($id) {
        $dataPenjualanBarang = $this->dataPenjualanBarangRepository->findWithoutFail($id);
        $id = $dataPenjualanBarang->ID_TRANSAKSI_PENJUALAN;
        $pdf = PDF::loadView('data_penjualan_barangs.print', compact('dataPenjualanBarang', 'id'))->setPaper('A5', 'potrait');
        return $pdf->stream('invoice.pdf');

        if (empty($dataPenjualanBarang)) {
            Flash::error('Penjualan not found');
            return redirect(route('data_penjualan_barang.index'));
        }

        return view('data_penjualan_barang.print', compact('data_penjualan_barang'));
    }
}
