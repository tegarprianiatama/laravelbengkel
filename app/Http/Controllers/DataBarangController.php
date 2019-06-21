<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataBarangRequest;
use App\Http\Requests\UpdateDataBarangRequest;
use App\Repositories\DataBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\DataSupplier;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Yajra\Datatables\Datatables;

class DataBarangController extends AppBaseController
{
    /** @var  DataBarangRepository */
    private $dataBarangRepository;

    public function __construct(DataBarangRepository $dataBarangRepo)
    {
        $this->dataBarangRepository = $dataBarangRepo;
    }

    /**
     * Display a listing of the DataBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataBarangs = $this->dataBarangRepository->with(['dataSupplier'])->all();
            // $dataBarangs = $this->dataBarangRepository->all();
            return DataTables::of($dataBarangs)
                ->addColumn('action', 'data_barangs.datatables_action')
                ->addIndexColumn()
                ->setRowClass(function ($data) {
                return $data->STOK <= 5 ? 'alert-warning' : '';
                })
                ->setRowAttr([
                'color' => 'red',
                ])
                ->make();
        }
            $dataBarangs = $this->dataBarangRepository->all();

        return view('data_barangs.index');
    }

    /**
     * Show the form for creating a new DataBarang.
     *
     * @return Response
     */
    public function create()
    {
        $datasupplier = DataSupplier::pluck('NAMA_SUPPLIER', 'ID_SUPPLIER');
        return view('data_barangs.create')->with(['datasupplier' => $datasupplier]);
    }

    /**
     * Store a newly created DataBarang in storage.
     *
     * @param CreateDataBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateDataBarangRequest $request)
    {
        $input = $request->all();

        $dataBarang = $this->dataBarangRepository->create($input);

        Flash::success('Data Barang saved successfully.');

        return redirect(route('dataBarangs.index'));
    }

    /**
     * Display the specified DataBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataBarang = $this->dataBarangRepository->findWithoutFail($id);

        if (empty($dataBarang)) {
            Flash::error('Data Barang not found');

            return redirect(route('dataBarangs.index'));
        }

        return view('data_barangs.show')->with('dataBarang', $dataBarang);
    }

    /**
     * Show the form for editing the specified DataBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataBarang = $this->dataBarangRepository->findWithoutFail($id);
        $datasupplier = DataSupplier::pluck('NAMA_SUPPLIER','ID_SUPPLIER');

        if (empty($dataBarang)) {
            Flash::error('Data Barang not found');

            return redirect(route('dataBarangs.index'));
        }

        return view('data_barangs.edit')->with(['dataBarang' => $dataBarang, 'datasupplier' => $datasupplier]);
    }

    /**
     * Update the specified DataBarang in storage.
     *
     * @param  int              $id
     * @param UpdateDataBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataBarangRequest $request)
    {
        request()->validate([
            'NAMA_BARANG' => 'required|unique:data_barang,NAMA_BARANG,' . $id . ',ID_BARANG'
        ]);

        $dataBarang = $this->dataBarangRepository->findWithoutFail($id);

        if (empty($dataBarang)) {
            Flash::error('Data Barang not found');

            return redirect(route('dataBarangs.index'));
        }
       
        $dataBarang = $this->dataBarangRepository->update($request->all(), $id);

        Flash::success('Data Barang updated successfully.');

        return redirect(route('dataBarangs.index'));
    }

    /**
     * Remove the specified DataBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataBarang = $this->dataBarangRepository->findWithoutFail($id);

        if (empty($dataBarang)) {
            Flash::error('Data Barang not found');

            return redirect(route('dataBarangs.index'));
        }

        $this->dataBarangRepository->delete($id);

        Flash::success('Data Barang deleted successfully.');

        return redirect(route('dataBarangs.index'));
    }

    public function find($id) {
        return DataBarang::find($id);
    }

  //   public function dataBarang()
  // {
  //     return Datatables::of(DataBarang::query())->make(true);
  // }
}
