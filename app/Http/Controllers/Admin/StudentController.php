<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Services\StudentService;
use App\Services\UserService;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(Request $request)
    {
        $students = $this->studentService->getAllStudent();
        return view('admin.student.index', compact('students', 'request'));
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(Request $request)
    {

        $user = $this->userService->createUser($request->all());

        if ($user) {
            flash('User created successfully');
        } else {
            flash('Failed to create User', 'error');
        }

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $student = $this->studentService->findStudent($id);

        if (!$student) {
            flash('Student not found!', 'error');
            return redirect()->route('student.index');
        }
        return view('admin.student.show')->with('student', $student);
    }

    public function edit($id)
    {
        $student = $this->studentService->findStudent($id);

        if (!$student) {
            flash('Student not found!', 'error');
            return redirect()->route('student.index');
        }

        return view('admin.student.edit', [
            'student' => $student,
            'request' => $student
        ]);
    }

    public function update(UserRequest $request, $id)
    {


        return redirect()->route('users.index');
    }

    public function destroy($id)
    {


        return redirect()->route('users.index');
    }

}
