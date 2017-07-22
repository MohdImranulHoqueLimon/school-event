<?php

namespace App\Services;

use App\Repositories\Admin\PermissionRepository;
use App\Repositories\Admin\RoleRepository;
use App\Repositories\Admin\UserRepository;
use App\Support\Configs\Constants;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use File;
use Image;

class UserService
{
    /**
     * @var \App\Repositories\Admin\UserRepository
     */
    private $repository;

    /**
     * @var \App\Repositories\Admin\RoleRepository
     */
    private $roleRepository;
    /**
     * @var \App\Repositories\Admin\PermissionRepository
     */
    private $permissionRepository;

    public function __construct(
        UserRepository $repository,
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository
    )
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Get all users
     *
     * @param array $filters
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllUser(array $filters)
    {
        $with = ['roles'];

        return $this->repository
            ->getUserWith($with, $filters)
            ->paginate(UtilityService::$displayRecordPerPage);
    }


    /**
     * Get all roles
     *
     * @return mixed
     */
    public function getAllRoles()
    {
        return $this->roleRepository->all(['name', 'id']);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function createUser(array $data)
    {
        try {
            if (isset($data['password']) && !empty($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            } else {
                $data['password'] = bcrypt('123456');
            }
            $data['status'] = ($data['status']) ? $data['status'] : Constants::$user_default_status;
            $user = $this->repository->create($data);
            $this->manageUserRole($user, $data);

            return $user;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return false;
    }

    public function findById($id) {
        return $this->repository->find($id);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findUser($id)
    {
        try {
            return $this->repository->findWith($id, ['roles', 'permissions']);
        } catch (ModelNotFoundException $e) {
            return false;
        }
    }

    /**
     * @param array $data
     * @param       $id
     *
     * @return bool
     */
    public function updateUser(array $data, $id)
    {
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        try {
            $user = $this->repository->find($id);
            $this->repository->update($data, $id);
            $this->manageUserRole($user, $data);

            return $user;
        } catch (ModelNotFoundException $e) {
            Log::error('User not found');
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::error($e->getMessage());
        }

        return false;
    }

    /**
     * Manage role assignment to user
     *
     * @param \App\User $user
     * @param array $data
     *
     * @return int
     */
    protected function manageUserRole(User $user, array $data)
    {
        if (!isset($data['roles']) || empty($data['roles'])) {
            return $user->roles()->detach();
        }

        $roles = $this->roleRepository->findMany($data['roles']);

        return $user->syncRoles($roles);
    }

    /**
     * @return mixed
     */
    public function getAllPermissions()
    {
        return $this->permissionRepository->all(['name', 'id']);
    }

    /**
     * @param array $data
     * @param       $id
     *
     * @return bool|int|null
     */
    public function assignRolesToUser(array $data, $id)
    {
        try {
            $user = $this->repository->find($id);

            return $this->manageUserRole($user, $data);
        } catch (ModelNotFoundException $e) {
            return null;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param array $data
     * @param       $id
     *
     * @return bool|mixed|null
     */
    public function assignPermissionToUser(array $data, $id)
    {
        try {
            $user = $this->repository->find($id);

            // if empty detach all permission
            if (empty($data['permissions'])) {
                $user->permissions()->detach();
                $user->forgetCachedPermissions();

                return $user;
            }

            $user->permissions()->sync($data['permissions']);
            $user->forgetCachedPermissions();

            return $user;
        } catch (ModelNotFoundException $e) {
            Log::debug('Role not found');
            return null;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return false;
    }


    /**
     * @param $id
     *
     * @return mixed
     */
    public function showAllUsersByRoleID($id)
    {
        return User::whereHas('roles', function ($query) use ($id) {
            $query->where('id', '=', $id);
        })->get();
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function showAllUsersByRoleName($name)
    {
        return User::whereHas('roles', function ($query) use ($name) {
            $query->where('name', '=', $name);
        })->get();
    }

    /**
     * @return array
     */
    public function findCurrentUserRole()
    {
        $role = array();
        foreach (auth()->user()->roles as $thisRoles) {
            $role [] = $thisRoles['name'];
        }

        return $role;
    }

    public function emailIsHave($email, $id)
    {
        return $this->repository->findUserByEmail($email, $id);
    }

    /**
     * @param $email
     * @param $id
     * @return mixed
     */
    public function emailIsHaveNotThisUser($email, $id)
    {
        return $this->repository->findUserByEmailNotThis($email, $id);
    }

    /**
     * @param $email
     * @return UserRepository
     */
    public function getUserByEmail($email)
    {
        return $this->repository->getUserByEmail($email);
    }

    /**
     * @param $title
     * @param $id
     * @param $roleID
     * @return mixed
     */
    public function showUserListByRole($title, $id, $roleID)
    {
        return $this->repository->customLists($title, $id, $roleID)->toArray();
    }

    public function savePhoto($photo)
    {
        if (isset($photo) && !empty(trim($photo))) {
            $photoname = time() . '.' . $photo->getClientOriginalExtension();
            //$destinationPath = public_path('images/avatar/thumbnail_images');
            $destinationPath = env('UPLOAD_USER_AVATAR_THUMBNAIL');
            $thumb_img = Image::make($photo->getRealPath())->resize(362, 231);
            $thumb_img->save($destinationPath . '/' . $photoname, 80);
            //$destinationPath = public_path('images/avatar/normal_images');
            $destinationPath = env('UPLOAD_USER_AVATAR_NORMAL');
            $normal_img = Image::make($photo->getRealPath())->resize(848, 335);
            $normal_img->save($destinationPath . '/' . $photoname, 80);
            return $photoname;
        }

        return null;
    }

    /**
     * @param $photo_name
     * @return bool
     */
    public function removePhoto($photo_name)
    {
        if (!$photo_name) {
            return false;
        }

        $destinationPath = public_path('images/avatar/thumbnail_images');

        $deleteOldImage = $destinationPath . '/' . $photo_name;
        if (File::isFile($deleteOldImage)) {
            File::delete($deleteOldImage);
        }

        $destinationPath = public_path('images/avatar/normal_images');

        $deleteOldImage = $destinationPath . '/' . $photo_name;
        if (File::isFile($deleteOldImage)) {
            File::delete($deleteOldImage);
        }

        return true;
    }

    public function changeUserStatus(  $id, $value )
    {
        //$this->model->where('id', $id)->update(['status' => 1]);
        return $this->repository->updateUserStatus($id, $value);
    }
}
