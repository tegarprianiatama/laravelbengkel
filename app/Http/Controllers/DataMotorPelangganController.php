<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataMotorPelangganRequest;
use App\Http\Requests\UpdateDataMotorPelangganRequest;
use App\Repositories\DataMotorPelangganRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\DataPelanggan;
use App\Models\DataMotorPelanggan;
use App\Models\KategoriMotor;
use Yajra\Datatables\Datatables;


class DataMotorPelangganController extends AppBaseController
{
    /** @var  DataMotorPelangganRepository */
    private $dataMotorPelangganRepository;

    public function __construct(DataMotorPelangganRepository $dataMotorPelangganRepo)
    {
        $this->dataMotorPelangganRepository = $dataMotorPelangganRepo;
    }

    /**
     * Display a listing of the DataMotorPelanggan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $dataMotorPelanggans = DataMotorPelanggan::orderBy('created_at', 'desc')->with(['dataPelanggan', 'kategoriMotor'])->where('ID_PELANGGAN', $id)->get();
            return DataTables::of($dataMotorPelanggans)
            ->addColumn('action', function($row) {
                return view('data_motor_pelanggans.datatables_actions', compact('row'));  
            })
            ->addIndexColumn()
            ->make(true);
        }
        return view('data_motor_pelanggans.index');
    }

    /**
     * Show the form for creating a new DataMotorPelanggan.
     *
     * @return Response
     */
    public function create($idPelanggan)
    {
        // $dataPelanggan = DataPelanggan::pluck('NAMA','ID_PELANGGAN');
        $dataPelanggan = DataPelanggan::where('ID_PELANGGAN', $idPelanggan)->first();
        $kategorimotor = KategoriMotor::pluck('NAMA','ID_KATEGORI_MOTOR');
        return view('data_motor_pelanggans.create')->with(['dataPelanggan'  => $dataPelanggan, 'kategorimotor'  => $kategorimotor]);
    }

    /**
     * Store a newly created DataMotorPelanggan in storage.
     *
     * @param CreateDataMotorPelangganRequest $request
     *
     * @return Response
     */
    public function store(CreateDataMotorPelangganRequest $request)
    {
        $input = $request->all();
        
        $dataMotorPelanggan = $this->dataMotorPelangganRepository->create($input);

        Flash::success('Data Motor Pelanggan saved successfully.');

        return redirect(route('dataMotorPelanggans.index', $request->ID_PELANGGAN));
    }

    /**
     * Display the specified DataMotorPelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataMotorPelanggan = $this->dataMotorPelangganRepository->findWithoutFail($id);

        if (empty($dataMotorPelanggan)) {
            Flash::error('Data Motor Pelanggan not found');

            return redirect(route('dataMotorPelanggans.index'));
        }

        return view('data_motor_pelanggans.show')->with('dataMotorPelanggan', $dataMotorPelanggan);
    }

    /**
     * Show the form for editing the specified DataMotorPelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($idPelanggan, $id)
    {
        $dataMotorPelanggan = $this->dataMotorPelangganRepository->findWithoutFail($id);
        $dataPelanggan = DataPelanggan::where('ID_PELANGGAN', $idPelanggan)->first();
        $kategorimotor = KategoriMotor::pluck('NAMA','ID_KATEGORI_MOTOR');

        if (empty($dataMotorPelanggan)) {
            Flash::error('Data Motor Pelanggan not found');

            return redirect(route('dataMotorPelanggans.index'));
        }

        return view('data_motor_pelanggans.edit')->with(['dataMotorPelanggan' => $dataMotorPelanggan, 'dataPelanggan' => $dataPelanggan, 'kategorimotor'  => $kategorimotor]);
    }

    /**
     * Update the specified DataMotorPelanggan in storage.
     *
     * @param  int              $id
     * @param UpdateDataMotorPelangganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataMotorPelangganRequest $request)
    {
        request()->validate([
            'NO_POL' => 'required|unique:data_motor_pelanggan,NO_POL,' . $id . ',ID_DETAIL_MOTOR'
        ]);

        $dataMotorPelanggan = $this->dataMotorPelangganRepository->findWithoutFail($id);

        if (empty($dataMotorPelanggan)) {
            Flash::error('Data Motor Pelanggan not found');

            return redirect(route('dataMotorPelanggans.index'));
        }

        $dataMotorPelanggan = $this->dataMotorPelangganRepository->update($request->all(), $id);

        Flash::success('Data Motor Pelanggan updated successfully.');

        return redirect(route('dataMotorPelanggans.index', $request->ID_PELANGGAN));
    }

    /**
     * Remove the specified DataMotorPelanggan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($pelangganId, $id)
    {
        $dataMotorPelanggan = $this->dataMotorPelangganRepository->findWithoutFail($id);

        if (empty($dataMotorPelanggan)) {
            Flash::error('Data Motor Pelanggan not found');

            return redirect(route('dataMotorPelanggans.index'));
        }

        $this->dataMotorPelangganRepository->delete($id);

        Flash::success('Data Motor Pelanggan deleted successfully.');

        return redirect(route('dataMotorPelanggans.index', [$pelangganId]));
    }
}
