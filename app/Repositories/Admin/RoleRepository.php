<?php

namespace App\Repositories\Admin;

use App\Repositories\Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    /**
     * @return mixed
     */
    public function allRoles()
    {
        return $this->model->get(['name', 'id', 'created_at']);
    }


    /**
     * Find many role
     *
     * @param array $roles Array of role id
     *
     * @return mixed
     */
    public function findMany(array $roles)
    {
        return $this->model->findMany($roles);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPermissions()
    {
        return Permission::all(['id', 'name']);
    }

    /**
     * @param $input
     * @param $role_id
     *
     * @return bool|mixed|null
     */
    public function assignPermissionToRole($input, $role_id)
    {
        try {
            $role = $this->find($role_id);

            // if empty detach all permission
            if (empty($input['permissions'])) {
                $role->permissions()->detach();
                $role->forgetCachedPermissions();

                return $role;
            }

            $role->permissions()->sync($input['permissions']);
            $role->forgetCachedPermissions();

            return $role;
        } catch (ModelNotFoundException $e) {
            Log::debug('Role not found');
            return null;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return false;
    }
}