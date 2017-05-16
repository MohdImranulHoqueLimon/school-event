<?php
/**
 * Created by PhpStorm.
 * User: limon
 * Date: 5/17/17
 * Time: 1:28 AM
 */

namespace App\Repositories;


use App\Models\Student;

class StudentRepository extends  Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Student::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param       $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    public function getAllStudent(){
        return $this->model->get();
    }
}