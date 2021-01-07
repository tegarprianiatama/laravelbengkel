<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataKasirRequest;
use App\Http\Requests\UpdateDataKasirRequest;
use App\Repositories\DataKasirRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use File;
use App\Models\Role;
use DB;

class DataKasirController extends AppBaseController
{
    /** @var  DataKasirRepository */
    private $dataKasirRepository;

    public function __construct(DataKasirRepository $dataKasirRepo)
    {
        $this->dataKasirRepository = $dataKasirRepo;
    }

    /**
     * Display a listing of the DataKasir.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataKasirRepository->pushCriteria(new RequestCriteria($request));
        $dataKasirs = $this->dataKasirRepository->all();

        return view('data_kasirs.index')
            ->with('dataKasirs', $dataKasirs);
    }

    /**
     * Show the form for creating a new DataKasir.
     *
     * @return Response
     */
    public function create()
    {
        $role = Role::pluck('name', 'id');
        return view('data_kasirs.create')->with(['role' => $role]);
    }

    /**
     * Store a newly created DataKasir in storage.
     *
     * @param CreateDataKasirRequest $request
     *
     * @return Response
     */
    public function store(CreateDataKasirRequest $request)
    {
        $input = $request->all();

        $imageName = time().'.'.request()->FOTO->getClientOriginalExtension();
        request()->FOTO->move(public_path('images'),$imageName);
        $input['FOTO'] = $imageName;

        $user = new \App\User();
        $user->name = $input['NAMA_KASIR'];
        $user->email = $input['EMAIL'];
        $user->password = bcrypt('password');
        $user->role_id = Role::where('guard_name', 'kasir')->first()->id;
        $user->save();

        $input['USER_ID'] = $user->id;
        $dataKasir = $this->dataKasirRepository->create($input);
        Flash::success('Data Kasir saved successfully.');

        return redirect(route('dataKasirs.index'));
    }

    /**
     * Display the specified DataKasir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataKasir = $this->dataKasirRepository->findWithoutFail($id);

        if (empty($dataKasir)) {
            Flash::error('Data Kasir not found');

            return redirect(route('dataKasirs.index'));
        }

        return view('data_kasirs.show')->with('dataKasir', $dataKasir);
    }

    /**
     * Show the form for editing the specified DataKasir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::pluck('name','id');
        $dataKasir = $this->dataKasirRepository->findWithoutFail($id);

        if (empty($dataKasir)) {
            Flash::error('Data Kasir not found');

            return redirect(route('dataKasirs.index'));
        }

        return view('data_kasirs.edit')->with('dataKasir', $dataKasir)->with(['role' => $role]);
    }

    /**
     * Update the specified DataKasir in storage.
     *
     * @param  int              $id
     * @param UpdateDataKasirRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataKasirRequest $request)
    {
        // dd($request->FOTO);
        $dataKasir = $this->dataKasirRepository->findWithoutFail($id);

        if (empty($dataKasir)) {
            Flash::error('Data Kasir not found');

            return redirect(route('dataKasirs.index'));
        }

        if (!empty($request->FOTO)) {
            File::delete(public_path("images/".$dataKasir->FOTO));
            $imageName = time().'.'.request()->FOTO->getClientOriginalExtension();
            request()->FOTO->move(public_path('images'), $imageName);
            $input['FOTO'] = $imageName;
        }

        $dataKasir = $this->dataKasirRepository->update($input,$id);

        Flash::success('Data Kasir updated successfully.');

        return redirect(route('dataKasirs.index'));
    }

    /**
     * Remove the specified DataKasir from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataKasir = $this->dataKasirRepository->findWithoutFail($id);

        if (empty($dataKasir)) {
            Flash::error('Data Kasir not found');

            return redirect(route('dataKasirs.index'));
        }

        $this->dataKasirRepository->delete($id);

        Flash::success('Data Kasir deleted successfully.');

        return redirect(route('dataKasirs.index'));
    }
}
