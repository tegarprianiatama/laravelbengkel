<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailPembelianBarangRequest;
use App\Http\Requests\UpdateDetailPembelianBarangRequest;
use App\Repositories\DetailPembelianBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DataPembelianBarang;
use App\Models\DataBarang;
class DetailPembelianBarangController extends AppBaseController
{
    /** @var  DetailPembelianBarangRepository */
    private $detailPembelianBarangRepository;

    public function __construct(DetailPembelianBarangRepository $detailPembelianBarangRepo)
    {
        $this->detailPembelianBarangRepository = $detailPembelianBarangRepo;
    }

    /**
     * Display a listing of the DetailPembelianBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailPembelianBarangRepository->pushCriteria(new RequestCriteria($request));
        $detailPembelianBarangs = $this->detailPembelianBarangRepository->all();
        return view('detail_pembelian_barangs.index')
            ->with('detailPembelianBarangs', $detailPembelianBarangs);
    }

    /**
     * Show the form for creating a new DetailPembelianBarang.
     *
     * @return Response
     */
    public function create()
    {
        $datapembelianbarang = DataPembelianBarang::pluck('ID_DATA_PEMBELIAN_BARANG');
        $databarang = DataBarang::pluck('NAMA_BARANG','ID_BARANG');
        return view('detail_pembelian_barangs.create')->with(['datapembelianbarang' => $datapembelianbarang, 'databarang' => $databarang]);
    }

    /**
     * Store a newly created DetailPembelianBarang in storage.
     *
     * @param CreateDetailPembelianBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPembelianBarangRequest $request)
    {
        $input = $request->all();

        $detailPembelianBarang = $this->detailPembelianBarangRepository->create($input);

        Flash::success('Detail Pembelian Barang saved successfully.');

        return redirect(route('detailPembelianBarangs.index'));
    }

    /**
     * Display the specified DetailPembelianBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailPembelianBarang = $this->detailPembelianBarangRepository->findWithoutFail($id);

        if (empty($detailPembelianBarang)) {
            Flash::error('Detail Pembelian Barang not found');

            return redirect(route('detailPembelianBarangs.index'));
        }

        return view('detail_pembelian_barangs.show')->with('detailPembelianBarang', $detailPembelianBarang);
    }

    /**
     * Show the form for editing the specified DetailPembelianBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailPembelianBarang = $this->detailPembelianBarangRepository->findWithoutFail($id);

        if (empty($detailPembelianBarang)) {
            Flash::error('Detail Pembelian Barang not found');

            return redirect(route('detailPembelianBarangs.index'));
        }

        return view('detail_pembelian_barangs.edit')->with('detailPembelianBarang', $detailPembelianBarang);
    }

    /**
     * Update the specified DetailPembelianBarang in storage.
     *
     * @param  int              $id
     * @param UpdateDetailPembelianBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPembelianBarangRequest $request)
    {
        $detailPembelianBarang = $this->detailPembelianBarangRepository->findWithoutFail($id);

        if (empty($detailPembelianBarang)) {
            Flash::error('Detail Pembelian Barang not found');

            return redirect(route('detailPembelianBarangs.index'));
        }

        $detailPembelianBarang = $this->detailPembelianBarangRepository->update($request->all(), $id);

        Flash::success('Detail Pembelian Barang updated successfully.');

        return redirect(route('detailPembelianBarangs.index'));
    }

    /**
     * Remove the specified DetailPembelianBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailPembelianBarang = $this->detailPembelianBarangRepository->findWithoutFail($id);

        if (empty($detailPembelianBarang)) {
            Flash::error('Detail Pembelian Barang not found');

            return redirect(route('detailPembelianBarangs.index'));
        }

        $this->detailPembelianBarangRepository->delete($id);

        Flash::success('Detail Pembelian Barang deleted successfully.');

        return redirect(route('detailPembelianBarangs.index'));
    }
}
