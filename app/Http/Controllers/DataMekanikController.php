<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataMekanikRequest;
use App\Http\Requests\UpdateDataMekanikRequest;
use App\Repositories\DataMekanikRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DataMekanik;

class DataMekanikController extends AppBaseController
{
    /** @var  DataMekanikRepository */
    private $dataMekanikRepository;

    public function __construct(DataMekanikRepository $dataMekanikRepo)
    {
        $this->dataMekanikRepository = $dataMekanikRepo;
    }

    /**
     * Display a listing of the DataMekanik.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataMekanikRepository->pushCriteria(new RequestCriteria($request));
        $dataMekaniks = $this->dataMekanikRepository->all();

        return view('data_mekaniks.index')
            ->with('dataMekaniks', $dataMekaniks);
    }

    /**
     * Show the form for creating a new DataMekanik.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_mekaniks.create');
    }

    /**
     * Store a newly created DataMekanik in storage.
     *
     * @param CreateDataMekanikRequest $request
     *
     * @return Response
     */
    public function store(CreateDataMekanikRequest $request)
    {
        $input = $request->all();

        $dataMekanik = $this->dataMekanikRepository->create($input);

        Flash::success('Data Mekanik saved successfully.');

        return redirect(route('dataMekaniks.index'));
    }

    /**
     * Display the specified DataMekanik.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataMekanik = $this->dataMekanikRepository->findWithoutFail($id);

        if (empty($dataMekanik)) {
            Flash::error('Data Mekanik not found');

            return redirect(route('dataMekaniks.index'));
        }

        return view('data_mekaniks.show')->with('dataMekanik', $dataMekanik);
    }

    /**
     * Show the form for editing the specified DataMekanik.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataMekanik = $this->dataMekanikRepository->findWithoutFail($id);

        if (empty($dataMekanik)) {
            Flash::error('Data Mekanik not found');

            return redirect(route('dataMekaniks.index'));
        }

        return view('data_mekaniks.edit')->with('dataMekanik', $dataMekanik);
    }

    /**
     * Update the specified DataMekanik in storage.
     *
     * @param  int              $id
     * @param UpdateDataMekanikRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataMekanikRequest $request)
    {
        $dataMekanik = $this->dataMekanikRepository->findWithoutFail($id);

        if (empty($dataMekanik)) {
            Flash::error('Data Mekanik not found');

            return redirect(route('dataMekaniks.index'));
        }

        $dataMekanik = $this->dataMekanikRepository->update($request->all(), $id);

        Flash::success('Data Mekanik updated successfully.');

        return redirect(route('dataMekaniks.index'));
    }

    /**
     * Remove the specified DataMekanik from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataMekanik = $this->dataMekanikRepository->findWithoutFail($id);

        if (empty($dataMekanik)) {
            Flash::error('Data Mekanik not found');

            return redirect(route('dataMekaniks.index'));
        }

        $this->dataMekanikRepository->delete($id);

        Flash::success('Data Mekanik deleted successfully.');

        return redirect(route('dataMekaniks.index'));
    }

        public function find($id) {
        return DataMekanik::find($id);
    }
}
