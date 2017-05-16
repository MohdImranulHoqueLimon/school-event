<?php

namespace App\Services;

use App\Models\Student;
use App\Repositories\Admin\PermissionRepository;
use App\Repositories\Admin\RoleRepository;
use App\Repositories\Admin\UserRepository;
use App\Repositories\StudentRepository;
use App\Support\Configs\Constants;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class StudentService extends BaseService
{

    private $studentRepository;


    public function __construct(Student $student, StudentRepository $studentRepository)
    {
        $this->model = $student;
        $this->studentRepository = $studentRepository;
    }

    function getAllStudent()
    {
        return $this->studentRepository->getAllStudent();
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
}
