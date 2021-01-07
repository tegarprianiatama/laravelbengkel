<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailPenjualanBarangRequest;
use App\Http\Requests\UpdateDetailPenjualanBarangRequest;
use App\Repositories\DetailPenjualanBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DetailPenjualanBarangController extends AppBaseController
{
    /** @var  DetailPenjualanBarangRepository */
    private $detailPenjualanBarangRepository;

    public function __construct(DetailPenjualanBarangRepository $detailPenjualanBarangRepo)
    {
        $this->detailPenjualanBarangRepository = $detailPenjualanBarangRepo;
    }

    /**
     * Display a listing of the DetailPenjualanBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailPenjualanBarangRepository->pushCriteria(new RequestCriteria($request));
        $detailPenjualanBarangs = $this->detailPenjualanBarangRepository->all();

        return view('detail_penjualan_barangs.index')
            ->with('detailPenjualanBarangs', $detailPenjualanBarangs);
    }

    /**
     * Show the form for creating a new DetailPenjualanBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_penjualan_barangs.create');
    }

    /**
     * Store a newly created DetailPenjualanBarang in storage.
     *
     * @param CreateDetailPenjualanBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPenjualanBarangRequest $request)
    {
        $input = $request->all();

        $detailPenjualanBarang = $this->detailPenjualanBarangRepository->create($input);

        Flash::success('Detail  Penjualan  Barang saved successfully.');

        return redirect(route('detailPenjualanBarangs.index'));
    }

    /**
     * Display the specified DetailPenjualanBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailPenjualanBarang = $this->detailPenjualanBarangRepository->findWithoutFail($id);

        if (empty($detailPenjualanBarang)) {
            Flash::error('Detail  Penjualan  Barang not found');

            return redirect(route('detailPenjualanBarangs.index'));
        }

        return view('detail_penjualan_barangs.show')->with('detailPenjualanBarang', $detailPenjualanBarang);
    }

    /**
     * Show the form for editing the specified DetailPenjualanBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailPenjualanBarang = $this->detailPenjualanBarangRepository->findWithoutFail($id);

        if (empty($detailPenjualanBarang)) {
            Flash::error('Detail  Penjualan  Barang not found');

            return redirect(route('detailPenjualanBarangs.index'));
        }

        return view('detail_penjualan_barangs.edit')->with('detailPenjualanBarang', $detailPenjualanBarang);
    }

    /**
     * Update the specified DetailPenjualanBarang in storage.
     *
     * @param  int              $id
     * @param UpdateDetailPenjualanBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPenjualanBarangRequest $request)
    {
        $detailPenjualanBarang = $this->detailPenjualanBarangRepository->findWithoutFail($id);

        if (empty($detailPenjualanBarang)) {
            Flash::error('Detail  Penjualan  Barang not found');

            return redirect(route('detailPenjualanBarangs.index'));
        }

        $detailPenjualanBarang = $this->detailPenjualanBarangRepository->update($request->all(), $id);

        Flash::success('Detail  Penjualan  Barang updated successfully.');

        return redirect(route('detailPenjualanBarangs.index'));
    }

    /**
     * Remove the specified DetailPenjualanBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailPenjualanBarang = $this->detailPenjualanBarangRepository->findWithoutFail($id);

        if (empty($detailPenjualanBarang)) {
            Flash::error('Detail  Penjualan  Barang not found');

            return redirect(route('detailPenjualanBarangs.index'));
        }

        $this->detailPenjualanBarangRepository->delete($id);

        Flash::success('Detail  Penjualan  Barang deleted successfully.');

        return redirect(route('detailPenjualanBarangs.index'));
    }
}
