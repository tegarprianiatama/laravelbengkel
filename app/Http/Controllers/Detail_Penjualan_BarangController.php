<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetail_Penjualan_BarangRequest;
use App\Http\Requests\UpdateDetail_Penjualan_BarangRequest;
use App\Repositories\Detail_Penjualan_BarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Detail_Penjualan_BarangController extends AppBaseController
{
    /** @var  Detail_Penjualan_BarangRepository */
    private $detailPenjualanBarangRepository;

    public function __construct(Detail_Penjualan_BarangRepository $detailPenjualanBarangRepo)
    {
        $this->detailPenjualanBarangRepository = $detailPenjualanBarangRepo;
    }

    /**
     * Display a listing of the Detail_Penjualan_Barang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailPenjualanBarangRepository->pushCriteria(new RequestCriteria($request));
        $detailPenjualanBarangs = $this->detailPenjualanBarangRepository->all();

        return view('detail__penjualan__barangs.index')
            ->with('detailPenjualanBarangs', $detailPenjualanBarangs);
    }

    /**
     * Show the form for creating a new Detail_Penjualan_Barang.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail__penjualan__barangs.create');
    }

    /**
     * Store a newly created Detail_Penjualan_Barang in storage.
     *
     * @param CreateDetail_Penjualan_BarangRequest $request
     *
     * @return Response
     */
    public function store(CreateDetail_Penjualan_BarangRequest $request)
    {
        $input = $request->all();

        $detailPenjualanBarang = $this->detailPenjualanBarangRepository->create($input);

        Flash::success('Detail  Penjualan  Barang saved successfully.');

        return redirect(route('detailPenjualanBarangs.index'));
    }

    /**
     * Display the specified Detail_Penjualan_Barang.
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

        return view('detail__penjualan__barangs.show')->with('detailPenjualanBarang', $detailPenjualanBarang);
    }

    /**
     * Show the form for editing the specified Detail_Penjualan_Barang.
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

        return view('detail__penjualan__barangs.edit')->with('detailPenjualanBarang', $detailPenjualanBarang);
    }

    /**
     * Update the specified Detail_Penjualan_Barang in storage.
     *
     * @param  int              $id
     * @param UpdateDetail_Penjualan_BarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetail_Penjualan_BarangRequest $request)
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
     * Remove the specified Detail_Penjualan_Barang from storage.
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
