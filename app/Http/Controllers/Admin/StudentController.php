<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public static $rules = [
        'full_name' => 'required', 'phone' => 'required', 'email' => 'required', 'address' => 'required',
        'city' => 'required', 'status' => 'required',
    ];

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

        if (!$student && $id > 0) {
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

        return view('admin.student.edit', ['student' => $student]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, self::$rules);
        $student = $this->studentService->find($id);
        $result = $student->update($request->except(['_token', '_method']));

        if($result) {
            flash('Successfully updated Student');
        } else {
            flash('Failed to edit student', 'error');
            return redirect()->back();
        }

        return redirect('admin/student/index');
    }

    public function destroy($id)
    {
        $result = $this->studentService->deleteStudent($id);
        if($result) {
            flash('Student removed successfully', 'success');
        } else {
            flash('Failed to removed student', 'error');
        }
        return redirect()->back();
    }

}
