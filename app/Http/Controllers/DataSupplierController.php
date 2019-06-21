<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataSupplierRequest;
use App\Http\Requests\UpdateDataSupplierRequest;
use App\Repositories\DataSupplierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Yajra\Datatables\Datatables;

class DataSupplierController extends AppBaseController
{
    /** @var  DataSupplierRepository */
    private $dataSupplierRepository;

    public function __construct(DataSupplierRepository $dataSupplierRepo)
    {
        $this->dataSupplierRepository = $dataSupplierRepo;
    }

    /**
     * Display a listing of the DataSupplier.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->dataSupplierRepository->pushCriteria(new RequestCriteria($request));
        // $dataSuppliers = $this->dataSupplierRepository->all();

        if ($request->ajax()) {
            $dataSuppliers = $this->dataSupplierRepository->all();
            return DataTables::of($dataSuppliers)
                ->addColumn('action', 'data_suppliers.datatables_actions')
                ->addIndexColumn()
                ->make();

            }

        return view('data_suppliers.index');
    }

    /**
     * Show the form for creating a new DataSupplier.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_suppliers.create');
    }

    /**
     * Store a newly created DataSupplier in storage.
     *
     * @param CreateDataSupplierRequest $request
     *
     * @return Response
     */
    public function store(CreateDataSupplierRequest $request)
    {
        $input = $request->all();

        $dataSupplier = $this->dataSupplierRepository->create($input);

        Flash::success('Data Supplier saved successfully.');

        return redirect(route('dataSuppliers.index'));
    }

    /**
     * Display the specified DataSupplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataSupplier = $this->dataSupplierRepository->findWithoutFail($id);

        if (empty($dataSupplier)) {
            Flash::error('Data Supplier not found');

            return redirect(route('dataSuppliers.index'));
        }

        return view('data_suppliers.show')->with('dataSupplier', $dataSupplier);
    }

    /**
     * Show the form for editing the specified DataSupplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataSupplier = $this->dataSupplierRepository->findWithoutFail($id);

        if (empty($dataSupplier)) {
            Flash::error('Data Supplier not found');

            return redirect(route('dataSuppliers.index'));
        }

        return view('data_suppliers.edit')->with('dataSupplier', $dataSupplier);
    }

    /**
     * Update the specified DataSupplier in storage.
     *
     * @param  int              $id
     * @param UpdateDataSupplierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataSupplierRequest $request)
    {
        $dataSupplier = $this->dataSupplierRepository->findWithoutFail($id);

        if (empty($dataSupplier)) {
            Flash::error('Data Supplier not found');

            return redirect(route('dataSuppliers.index'));
        }

        $dataSupplier = $this->dataSupplierRepository->update($request->all(), $id);

        Flash::success('Data Supplier updated successfully.');

        return redirect(route('dataSuppliers.index'));
    }

    /**
     * Remove the specified DataSupplier from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataSupplier = $this->dataSupplierRepository->findWithoutFail($id);

        if (empty($dataSupplier)) {
            Flash::error('Data Supplier not found');

            return redirect(route('dataSuppliers.index'));
        }

        $this->dataSupplierRepository->delete($id);

        Flash::success('Data Supplier deleted successfully.');

        return redirect(route('dataSuppliers.index'));
    }
}
