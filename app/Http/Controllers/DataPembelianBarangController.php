<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataPembelianBarangRequest;
use App\Http\Requests\UpdateDataPembelianBarangRequest;
use App\Repositories\DataPembelianBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DataSupplier;
use App\Models\DataBarang;
use App\Models\DataPembelianBarang;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use PDF;
use Dompdf\Dompdf;

class DataPembelianBarangController extends AppBaseController
{
    /** @var  DataPembelianBarangRepository */
    private $dataPembelianBarangRepository;

    public function __construct(DataPembelianBarangRepository $dataPembelianBarangRepo)
    {
        $this->dataPembelianBarangRepository = $dataPembelianBarangRepo;
    }

    /**
     * Display a listing of the DataPembelianBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->dataPembelianBarangRepository->pushCriteria(new RequestCriteria($request));
        // $dataPembelianBarangs = $this->dataPembelianBarangRepository->all();

        if ($request->ajax()) {
            $dataPembelianBarangs = DataPembelianBarang::orderBy('created_at', 'desc')->with(['dataSupplier'])->get();
            return DataTables::of($dataPembelianBarangs)
                ->addColumn('action', 'data_pembelian_barangs.datatables_actions')
                ->addIndexColumn()
                ->editColumn('TGL_PEMBELIAN', function ($dataPembelianBarang) {
                    return $dataPembelianBarang->TGL_PEMBELIAN;
                })
                ->make(true);
        }

        return view('data_pembelian_barangs.index');
            // ->with('dataPembelianBarangs', $dataPembelianBarangs);
    }

    /**
     * Show the form for creating a new DataPembelianBarang.
     *
     * @return Response
     */
    public function create()
    {
        $datasupplier = DataSupplier::pluck('NAMA_SUPPLIER', 'ID_SUPPLIER');
        $databarang = DataBarang::pluck('NAMA_BARANG','ID_BARANG');
        return view('data_pembelian_barangs.create')->with(['datasupplier' => $datasupplier, 'databarang' => $databarang]);
    }

    /**
     * Store a newly created DataPembelianBarang in storage.
     *
     * @param CreateDataPembelianBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateDataPembelianBarangRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['TOTAL_BERSIH'] = str_replace('.','', $input['TOTAL_BERSIH']);
            $dataPembelianBarang = $this->dataPembelianBarangRepository->create($input);
            foreach ($input['id_barang'] as $key => $row) {
                $detail_pembelian_barang = new \App\Models\DetailPembelianBarang();
                $barang = DataBarang::where('ID_BARANG', $input['id_barang'][$key])->first();
                $detail_pembelian_barang->ID_DATA_PEMBELIAN_BARANG = $dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG;
                $detail_pembelian_barang->ID_BARANG = $barang->ID_BARANG;
                $detail_pembelian_barang->QTY = $input['qty'][$key];
                $detail_pembelian_barang->HARGA_MODAL = $input['harga_modal'][$key];
                $detail_pembelian_barang->HARGA_BARU = $input['harga_baru'][$key];
                $detail_pembelian_barang->SUBTOTAL = $input['subtotal'][$key];
                $detail_pembelian_barang->save();
                $new_stok = (int)$barang->STOK + (int)$input['qty'][$key];
                $barang->STOK = $new_stok;
                if ($input['harga_baru'][$key] != 0) {
                    $barang->HARGA_MODAL = $input['harga_baru'][$key];
                }
                $barang->save();
            }
            $result = $dataPembelianBarang->id;
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        Flash::success('Data Pembelian Barang saved successfully.');

        // return redirect(route('dataPembelianBarangs.index'));
        return redirect(route('dataPembelianBarangs.show', ['dataPembelianBarang' => $result]));
    }

    /**
     * Display the specified DataPembelianBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataPembelianBarang = $this->dataPembelianBarangRepository->with('detailPembelianBarang')->findWithoutFail($id);

        if (empty($dataPembelianBarang)) {
            Flash::error('Data Pembelian Barang not found');

            return redirect(route('dataPembelianBarangs.index'));
        }

        return view('data_pembelian_barangs.show')->with(['dataPembelianBarang' => $dataPembelianBarang]);
    }

    /**
     * Show the form for editing the specified DataPembelianBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataPembelianBarang = $this->dataPembelianBarangRepository->findWithoutFail($id);
        $datasupplier = DataSupplier::pluck('NAMA_SUPPLIER','ID_SUPPLIER');
        $databarang = DataBarang::all()->pluck('ID_BARANG');

        if (empty($dataPembelianBarang)) {
            Flash::error('Data Pembelian Barang not found');

            return redirect(route('dataPembelianBarangs.index'));
        }

        return view('data_pembelian_barangs.edit')->with(['dataPembelianBarang' => $dataPembelianBarang, 'datasupplier' => $datasupplier, 'databarang' => $databarang]);
    }

    /**
     * Update the specified DataPembelianBarang in storage.
     *
     * @param  int              $id
     * @param UpdateDataPembelianBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataPembelianBarangRequest $request)
    {
        $dataPembelianBarang = $this->dataPembelianBarangRepository->findWithoutFail($id);

        if (empty($dataPembelianBarang)) {
            Flash::error('Data Pembelian Barang not found');

            return redirect(route('dataPembelianBarangs.index'));
        }

        $dataPembelianBarang = $this->dataPembelianBarangRepository->update($request->all(), $id);

        Flash::success('Data Pembelian Barang updated successfully.');

        return redirect(route('dataPembelianBarangs.index'));
    }

    /**
     * Remove the specified DataPembelianBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataPembelianBarang = $this->dataPembelianBarangRepository->findWithoutFail($id);

        if (empty($dataPembelianBarang)) {
            Flash::error('Data Pembelian Barang not found');

            return redirect(route('dataPembelianBarangs.index'));
        }

        $this->dataPembelianBarangRepository->delete($id);

        Flash::success('Data Pembelian Barang deleted successfully.');

        return redirect(route('dataPembelianBarangs.index'));
    }
    public function print($id) {
        $dataPembelianBarang = $this->dataPembelianBarangRepository->findWithoutFail($id);
        $id = $dataPembelianBarang->ID_DATA_PEMBELIAN_BARANG;
        $pdf = PDF::loadView('data_pembelian_barangs.print', compact('dataPembelianBarang', 'id'))->setPaper('A5', 'potrait');
        return $pdf->stream('invoice.pdf');

        if (empty($dataPembelianBarang)) {
            Flash::error('Pembelian not found');
            return redirect(route('data_pembelian_barang.index'));
        }

        return view('data_pembelian_barang.print', compact('data_pembelian_barang'));
    }
}
