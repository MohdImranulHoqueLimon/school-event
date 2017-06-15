<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\PermissionRequest;
use App\Repositories\Admin\PermissionRepository;

class PermissionsController extends Controller
{
    /**
     * @var \App\Repositories\Admin\PermissionRepository
     */
    private $repository;

    /**
     * @param \App\Repositories\Admin\PermissionRepository $repository
     */
    public function __construct(PermissionRepository $repository)
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
        $userPermissions = $this->repository->allPermissions();

        return view('admin.permissions.index', compact('userPermissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $permission = $this->repository->create($request->except('_token'));

        if ($permission) {
            flash('permission created successfully');
            return redirect()->route('permissions.index');
        }

        flash('Failed to create permission!', 'error');

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
        $permissionDetails = $this->repository->find($id);

        return view('admin.permissions.show', compact('permissionDetails'));
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
        $permissionDetails = $this->repository->find($id);
        return view('admin.permissions.edit', compact('permissionDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionRequest $request
     * @param  int              $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $this->repository->update($request->except(['_token', '_method']), $id);

        flash('Permission has been updated');

        return redirect()->route('permissions.index');
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
        $permission = $this->repository->find($id);

        if ($permission) {
            flash('Permission has been deleted');

            $permission->delete();

        }

        return redirect()->route('permissions.index');
    }
}
