<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use App\Repositories\DetailTransaksiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DataTransaksi;
use App\Models\DataBarang;

class DetailTransaksiController extends AppBaseController
{
    /** @var  DetailTransaksiRepository */
    private $detailTransaksiRepository;

    public function __construct(DetailTransaksiRepository $detailTransaksiRepo)
    {
        $this->detailTransaksiRepository = $detailTransaksiRepo;
    }

    /**
     * Display a listing of the DetailTransaksi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailTransaksiRepository->pushCriteria(new RequestCriteria($request));
        $detailTransaksis = $this->detailTransaksiRepository->all();

        return view('detail_transaksis.index')
            ->with('detailTransaksis', $detailTransaksis);
    }

    /**
     * Show the form for creating a new DetailTransaksi.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_transaksis.create');
    }

    /**
     * Store a newly created DetailTransaksi in storage.
     *
     * @param CreateDetailTransaksiRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailTransaksiRequest $request)
    {
        $input = $request->all();

        $detailTransaksi = $this->detailTransaksiRepository->create($input);

        Flash::success('Detail Transaksi saved successfully.');

        return redirect(route('detailTransaksis.index'));
    }

    /**
     * Display the specified DetailTransaksi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailTransaksi = $this->detailTransaksiRepository->findWithoutFail($id);

        if (empty($detailTransaksi)) {
            Flash::error('Detail Transaksi not found');

            return redirect(route('detailTransaksis.index'));
        }

        return view('detail_transaksis.show')->with('detailTransaksi', $detailTransaksi);
    }

    /**
     * Show the form for editing the specified DetailTransaksi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailTransaksi = $this->detailTransaksiRepository->findWithoutFail($id);

        if (empty($detailTransaksi)) {
            Flash::error('Detail Transaksi not found');

            return redirect(route('detailTransaksis.index'));
        }

        return view('detail_transaksis.edit')->with('detailTransaksi', $detailTransaksi);
    }

    /**
     * Update the specified DetailTransaksi in storage.
     *
     * @param  int              $id
     * @param UpdateDetailTransaksiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailTransaksiRequest $request)
    {
        $detailTransaksi = $this->detailTransaksiRepository->findWithoutFail($id);

        if (empty($detailTransaksi)) {
            Flash::error('Detail Transaksi not found');

            return redirect(route('detailTransaksis.index'));
        }

        $detailTransaksi = $this->detailTransaksiRepository->update($request->all(), $id);

        Flash::success('Detail Transaksi updated successfully.');

        return redirect(route('detailTransaksis.index'));
    }

    /**
     * Remove the specified DetailTransaksi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailTransaksi = $this->detailTransaksiRepository->findWithoutFail($id);

        if (empty($detailTransaksi)) {
            Flash::error('Detail Transaksi not found');

            return redirect(route('detailTransaksis.index'));
        }

        $this->detailTransaksiRepository->delete($id);

        Flash::success('Detail Transaksi deleted successfully.');

        return redirect(route('detailTransaksis.index'));
    }
}
