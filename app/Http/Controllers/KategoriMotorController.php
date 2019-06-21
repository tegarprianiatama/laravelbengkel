<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKategoriMotorRequest;
use App\Http\Requests\UpdateKategoriMotorRequest;
use App\Repositories\KategoriMotorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KategoriMotorController extends AppBaseController
{
    /** @var  KategoriMotorRepository */
    private $kategoriMotorRepository;

    public function __construct(KategoriMotorRepository $kategoriMotorRepo)
    {
        $this->kategoriMotorRepository = $kategoriMotorRepo;
    }

    /**
     * Display a listing of the KategoriMotor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kategoriMotorRepository->pushCriteria(new RequestCriteria($request));
        $kategoriMotors = $this->kategoriMotorRepository->all();

        return view('kategori_motors.index')
            ->with('kategoriMotors', $kategoriMotors);
    }

    /**
     * Show the form for creating a new KategoriMotor.
     *
     * @return Response
     */
    public function create()
    {
        return view('kategori_motors.create');
    }

    /**
     * Store a newly created KategoriMotor in storage.
     *
     * @param CreateKategoriMotorRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriMotorRequest $request)
    {
        $input = $request->all();

        $kategoriMotor = $this->kategoriMotorRepository->create($input);

        Flash::success('Kategori Motor saved successfully.');

        return redirect(route('kategoriMotors.index'));
    }

    /**
     * Display the specified KategoriMotor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategoriMotor = $this->kategoriMotorRepository->findWithoutFail($id);

        if (empty($kategoriMotor)) {
            Flash::error('Kategori Motor not found');

            return redirect(route('kategoriMotors.index'));
        }

        return view('kategori_motors.show')->with('kategoriMotor', $kategoriMotor);
    }

    /**
     * Show the form for editing the specified KategoriMotor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategoriMotor = $this->kategoriMotorRepository->findWithoutFail($id);

        if (empty($kategoriMotor)) {
            Flash::error('Kategori Motor not found');

            return redirect(route('kategoriMotors.index'));
        }

        return view('kategori_motors.edit')->with('kategoriMotor', $kategoriMotor);
    }

    /**
     * Update the specified KategoriMotor in storage.
     *
     * @param  int              $id
     * @param UpdateKategoriMotorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriMotorRequest $request)
    {
        $kategoriMotor = $this->kategoriMotorRepository->findWithoutFail($id);

        if (empty($kategoriMotor)) {
            Flash::error('Kategori Motor not found');

            return redirect(route('kategoriMotors.index'));
        }

        $kategoriMotor = $this->kategoriMotorRepository->update($request->all(), $id);

        Flash::success('Kategori Motor updated successfully.');

        return redirect(route('kategoriMotors.index'));
    }

    /**
     * Remove the specified KategoriMotor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategoriMotor = $this->kategoriMotorRepository->findWithoutFail($id);

        if (empty($kategoriMotor)) {
            Flash::error('Kategori Motor not found');

            return redirect(route('kategoriMotors.index'));
        }

        $this->kategoriMotorRepository->delete($id);

        Flash::success('Kategori Motor deleted successfully.');

        return redirect(route('kategoriMotors.index'));
    }
}
