<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataPelangganRequest;
use App\Http\Requests\UpdateDataPelangganRequest;
use App\Repositories\DataPelangganRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DataPelangganController extends AppBaseController
{
    /** @var  DataPelangganRepository */
    private $dataPelangganRepository;

    public function __construct(DataPelangganRepository $dataPelangganRepo)
    {
        $this->dataPelangganRepository = $dataPelangganRepo;
    }

    /**
     * Display a listing of the DataPelanggan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataPelangganRepository->pushCriteria(new RequestCriteria($request));
        $dataPelanggans = $this->dataPelangganRepository->all();

        return view('data_pelanggans.index')
            ->with('dataPelanggans', $dataPelanggans);
    }

    /**
     * Show the form for creating a new DataPelanggan.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_pelanggans.create');
    }

    /**
     * Store a newly created DataPelanggan in storage.
     *
     * @param CreateDataPelangganRequest $request
     *
     * @return Response
     */
    public function store(CreateDataPelangganRequest $request)
    {
        $input = $request->all();

        $dataPelanggan = $this->dataPelangganRepository->create($input);

        Flash::success('Data Pelanggan saved successfully.');

        return redirect(route('dataPelanggans.index'));
    }

    /**
     * Display the specified DataPelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataPelanggan = $this->dataPelangganRepository->findWithoutFail($id);

        if (empty($dataPelanggan)) {
            Flash::error('Data Pelanggan not found');

            return redirect(route('dataPelanggans.index'));
        }

        return view('data_pelanggans.show')->with('dataPelanggan', $dataPelanggan);
    }

    /**
     * Show the form for editing the specified DataPelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataPelanggan = $this->dataPelangganRepository->findWithoutFail($id);

        if (empty($dataPelanggan)) {
            Flash::error('Data Pelanggan not found');

            return redirect(route('dataPelanggans.index'));
        }

        return view('data_pelanggans.edit')->with('dataPelanggan', $dataPelanggan);
    }

    /**
     * Update the specified DataPelanggan in storage.
     *
     * @param  int              $id
     * @param UpdateDataPelangganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataPelangganRequest $request)
    {
        $dataPelanggan = $this->dataPelangganRepository->findWithoutFail($id);

        if (empty($dataPelanggan)) {
            Flash::error('Data Pelanggan not found');

            return redirect(route('dataPelanggans.index'));
        }

        $dataPelanggan = $this->dataPelangganRepository->update($request->all(), $id);

        Flash::success('Data Pelanggan updated successfully.');

        return redirect(route('dataPelanggans.index'));
    }

    /**
     * Remove the specified DataPelanggan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataPelanggan = $this->dataPelangganRepository->findWithoutFail($id);

        if (empty($dataPelanggan)) {
            Flash::error('Data Pelanggan not found');

            return redirect(route('dataPelanggans.index'));
        }

        $this->dataPelangganRepository->delete($id);

        Flash::success('Data Pelanggan deleted successfully.');

        return redirect(route('dataPelanggans.index'));
    }
}
