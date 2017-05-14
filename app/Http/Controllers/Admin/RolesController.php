<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\RoleRequest;
use App\Repositories\Admin\RoleRepository;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * @var \App\Repositories\Admin\RoleRepository
     */
    private $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->middleware('role:Admin');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->repository->allRoles();

        return view('admin.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = $this->repository->create($request->except('_token'));

        if ($role) {
            flash('Role created successfully');
            return redirect()->route('roles.index');
        }

        flash('Failed to create role!', 'error');

        return redirect()->back()->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->repository->findWith($id, ['permissions']);

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roleDetails = $this->repository->find($id);
        return view('admin.roles.edit', compact('roleDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param  int        $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->repository->update($request->except(['_token', '_method']), $id);

        flash('Role has been updated');

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->repository->find($id);

        if ($role) {
            flash('Role has been deleted');

            $role->delete();

        }

        return redirect()->route('roles.index');
    }

    /**
     * @param $role_id
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function permission($role_id)
    {
        $role = $this->repository->findWith($role_id, ['permissions']);
        $permissions = $this->repository->getPermissions();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePermission(Request $request, $id)
    {
        $is_assigned = $this->repository->assignPermissionToRole($request->all(), $id);

        if ($is_assigned) {
            flash('Permission(s) assigned successfully');
        } else {
            flash('Failed to update permission');
        }

        return redirect()->route('roles.show', $id);
    }
}
