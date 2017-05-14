<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\StatusRequest;
use App\Repositories\Admin\StatusRepository;

class StatusController extends Controller
{
    /**
     * @var \App\Repositories\Admin\StatusRepository
     */
    private $repository;

    public function __construct(StatusRepository $repository)
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
        $status = $this->repository->allStatus();

        return view('admin.status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param \App\Http\Requests\Admin\StatusRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        $status = $this->repository->create($request->except('_token'));

        if ($status) {
            flash('Order Status created successfully');
            return redirect()->route('status.index');
        }

        flash('Failed to create Status!', 'error');

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
        $status = $this->repository->findWith($id, ['permissions']);

        return view('admin.status.show', compact('status'));
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
        $statusDetails = $this->repository->find($id);
        return view('admin.status.edit', compact('statusDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\StatusRequest $request
     * @param  int                                   $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
        $this->repository->update($request->except(['_token', '_method']), $id);

        flash('Status has been updated');

        return redirect()->route('status.index');
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
        $status = $this->repository->find($id);

        if ($status) {
            flash('Status has been deleted');

            $status->delete();
        }

        return redirect()->route('status.index');
    }
}
