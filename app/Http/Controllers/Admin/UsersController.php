<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @var \App\Services\UserService
     */
    private $userService;

    /**
     * @param \App\Services\UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->all();

        $users = $this->userService->getAllUser($filters);
        $roles = $this->userService->getAllRoles();
        return View('admin.users.index', compact('users','roles','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->userService->getAllRoles();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\UserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $user = $this->userService->createUser($request->all());

        if ($user) {
            flash('User created successfully');
        } else {
            flash('Failed to create User', 'error');
        }

        return redirect()->route('users.index');
    }

    private function validation($request) {
        $rules = [
            'name' => 'required',
            'phone' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'address' => 'required'
        ];
        $this->validate($request, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->userService->findUser($id);

        if (!$user) {
            flash('User not found!', 'error');

            return redirect()->route('users.index');
        }

        return view('admin.users.show')->with('user', $user);
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
        $user = $this->userService->findUser($id);

        if (!$user) {
            flash('User not found!', 'error');
            return redirect()->route('users.index');
        }

        $roles = $this->userService->getAllRoles();
        $userRoles = $user->roles()->pluck('id')->toArray();

        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UserRequest $request
     * @param  int                           $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $is_updated = $this->userService->updateUser($request->except('_token', '_method'), $id);

        if ($is_updated) {
            flash('User updated successfully.');
        } else {
            flash('Failed to update user!', 'error');
        }

        return redirect()->route('users.index');
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
        $user = $this->userService->findUser($id);

        if (!$user) {
            flash('User not found!', 'error');
        }

        $user->delete();
        flash('User deleted successfully');

        return redirect()->route('users.index');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|mixed
     */
    public function roles($id)
    {
        $user = $this->userService->findUser($id);

        if (!$user) {
            flash('User not found!', 'error');

            return redirect()->route('users.index');
        }

        $roles = $this->userService->getAllRoles();
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('admin.users.roles', compact('user', 'roles', 'userRoles'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveRoles(Request $request, $id)
    {
        $is_assigned = $this->userService->assignRolesToUser($request->only('roles'), $id);

        if ($is_assigned) {
            flash('User Role(s) updated');
        } else {
            flash('Failed to update role', 'error');
        }

        return redirect()->route('users.show', $id);
    }

    /**
     * @param $id
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|mixed
     */
    public function permissions($id)
    {
        $user = $this->userService->findUser($id);

        if (!$user) {
            flash('User not found!', 'error');

            return redirect()->route('users.index');
        }

        $permissions = $this->userService->getAllPermissions();
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('admin.users.permissions', compact('user', 'permissions', 'userPermissions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePermissions(Request $request, $id)
    {
        $is_assigned = $this->userService->assignPermissionToUser($request->only('permissions'), $id);

        if ($is_assigned) {
            flash('Permission(s) assigned successfully');
        } else {
            flash('Failed to update permission');
        }

        return redirect()->route('users.show', $id);
    }

    public function findHaveEmail(Request $request)
    {
        $input = $request->except('_token');
        $count = $this->userService->emailIsHave($input["email"], $input["user_id"]);
        $return["findUser"] = $count;
        if($count>0){
            $return["message"] = ('Email already have, please provide another email address!');
            $return["message_type"] = ('alert alert-danger alert-dismissible');
        }else{
            $return["message"] = '';
            $return["message_type"] = '';
        }
        return json_encode($return);
    }
}
