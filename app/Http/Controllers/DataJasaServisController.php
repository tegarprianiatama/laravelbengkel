<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataJasaServisRequest;
use App\Http\Requests\UpdateDataJasaServisRequest;
use App\Repositories\DataJasaServisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DataJasaServis;

class DataJasaServisController extends AppBaseController
{
    /** @var  DataJasaServisRepository */
    private $dataJasaServisRepository;

    public function __construct(DataJasaServisRepository $dataJasaServisRepo)
    {
        $this->dataJasaServisRepository = $dataJasaServisRepo;
    }

    /**
     * Display a listing of the DataJasaServis.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataJasaServisRepository->pushCriteria(new RequestCriteria($request));
        $dataJasaServis = $this->dataJasaServisRepository->all();

        return view('data_jasa_servis.index')
            ->with('dataJasaServis', $dataJasaServis);
    }

    /**
     * Show the form for creating a new DataJasaServis.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_jasa_servis.create');
    }

    /**
     * Store a newly created DataJasaServis in storage.
     *
     * @param CreateDataJasaServisRequest $request
     *
     * @return Response
     */
    public function store(CreateDataJasaServisRequest $request)
    {
        $input = $request->all();

        $dataJasaServis = $this->dataJasaServisRepository->create($input);

        Flash::success('Data Jasa Servis saved successfully.');

        return redirect(route('dataJasaServis.index'));
    }

    /**
     * Display the specified DataJasaServis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataJasaServis = $this->dataJasaServisRepository->findWithoutFail($id);

        if (empty($dataJasaServis)) {
            Flash::error('Data Jasa Servis not found');

            return redirect(route('dataJasaServis.index'));
        }

        return view('data_jasa_servis.show')->with('dataJasaServis', $dataJasaServis);
    }

    /**
     * Show the form for editing the specified DataJasaServis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataJasaServis = $this->dataJasaServisRepository->findWithoutFail($id);

        if (empty($dataJasaServis)) {
            Flash::error('Data Jasa Servis not found');

            return redirect(route('dataJasaServis.index'));
        }

        return view('data_jasa_servis.edit')->with('dataJasaServis', $dataJasaServis);
    }

    /**
     * Update the specified DataJasaServis in storage.
     *
     * @param  int              $id
     * @param UpdateDataJasaServisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataJasaServisRequest $request)
    {
        $dataJasaServis = $this->dataJasaServisRepository->findWithoutFail($id);

        if (empty($dataJasaServis)) {
            Flash::error('Data Jasa Servis not found');

            return redirect(route('dataJasaServis.index'));
        }

        $dataJasaServis = $this->dataJasaServisRepository->update($request->all(), $id);

        Flash::success('Data Jasa Servis updated successfully.');

        return redirect(route('dataJasaServis.index'));
    }

    /**
     * Remove the specified DataJasaServis from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataJasaServis = $this->dataJasaServisRepository->findWithoutFail($id);

        if (empty($dataJasaServis)) {
            Flash::error('Data Jasa Servis not found');

            return redirect(route('dataJasaServis.index'));
        }

        $this->dataJasaServisRepository->delete($id);

        Flash::success('Data Jasa Servis deleted successfully.');

        return redirect(route('dataJasaServis.index'));
    }

        public function find($id) {
        return DataJasaServis::find($id);
    }
}
