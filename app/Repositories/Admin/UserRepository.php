<?php

namespace App\Repositories\Admin;

use App\Repositories\Repository;
use App\User;

class UserRepository extends Repository
{
    public static $allowedFields = [
        'name', 'username', 'phone', 'address', 'permanent_address', 'profession', 'country',
        'batch', 'emergency_phone', 'email', 'status', 'user_image', 'password', 'city', 'permanent_city'
    ];

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param       $query
     */
    public function filterData(array $filter, $query)
    {
        // will implement later
    }

    /**
     * @param array $with
     * @param array $filters
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getUserWith(array $with, $filters)
    {
        $query = $this->getQuery();

        if (isset($filters['id']) && $filters['id']) {
            $query->where('id', '=', $filters['id']);
        }

        if (isset($filters['batch']) && $filters['batch']) {
            $query->where('batch', '=', $filters['batch']);
        }

        if (isset($filters['name']) && $filters['name']) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }

        if (isset($filters['role_id']) && $filters['role_id']) {
            $query->whereHas('roles', function ($q) use ($filters) {
                $q->where('role_id', $filters['role_id']);
            });
        } else {
            $query->with($with);
        }

        return $query;
    }

    /**
     * @param array  $data
     * @param        $id
     * @param string $attribute
     *
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $allowedData = [];

        foreach ($data as $key => $val) {
            if (in_array($key, self::$allowedFields)) {
                $allowedData[$key] = $val;
            }
        }

        return $this->model->where($attribute, '=', $id)->update($allowedData);
    }

    /**
     * @param $email
     * @param $id
     * @return int
     */
    public function findUserByEmail( $email, $id )
    {
        $query = $this->getQuery();

        if (isset($email) && $email) {
            $query->where('email', '=', $email);
        }
        if (isset($id) && $id) {
            $query->where('id', '!=', $id);
        }
        return $query->count();
    }

    /**
     * @param $email
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findUserByEmailNotThis( $email, $id )
    {
        $query = $this->getQuery();

        if (isset($email) && $email) {
            $query->where('email', '=', $email);
        }
        if (isset($id) && $id) {
            $query->where('id', '!=', $id);
        }
        return $query->first();
    }

    /**
     * @param $email
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getUserByEmail( $email )
    {
        $query = $this->getQuery();

        if (isset($email) && $email) {
            $query->where('email', '=', $email);
        }
        return $query->first();
    }

    /**
     * @param $title
     * @param $id
     * @param $roleID
     * @return mixed
     */
    public function customLists($title, $id, $roleID)
    {
        $users = User::where('status', 'ACTIVE')->whereHas('roles', function ($q) use ($roleID) {
                $q->where('role_id', $roleID);
            })->pluck($title,$id);
        return $users;
    }
}