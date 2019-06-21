<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Role;

class RoleController extends AppBaseController
{
    /** @var  DataMekanikRepository */

    /**
     * Display a listing of the DataMekanik.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = Role::all();

        return view('roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new DataMekanik.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created DataMekanik in storage.
     *
     * @param CreateDataMekanikRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $role = Role::create($input);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
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
    	$role = Role::find($id);
        if (empty($roles)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('roles', $roles);
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
        $role = Role::find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with('role', $role);
    }

    /**
     * Update the specified DataMekanik in storage.
     *
     * @param  int              $id
     * @param UpdateDataMekanikRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = Role::find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $role->update($request->all());

        Flash::success('Roles updated successfully.');

        return redirect(route('roles.index'));
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
        $role = Role::find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $role->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }

        public function find($id) {
        return Role::find($id);
    }
}
