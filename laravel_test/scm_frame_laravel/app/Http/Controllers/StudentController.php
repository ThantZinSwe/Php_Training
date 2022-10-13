<?php

namespace App\Http\Controllers;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Http\Requests\Student\StudentCreateRequest;
use App\Http\Requests\Student\StudentUpdateRequest;

class StudentController extends Controller
{
    /**
     * studentInterface
     */
    private $studentInterface;

    /**
     * Create new controller instance
     * @return void
     */
    public function __construct(StudentDaoInterface $studentDaoInterface)
    {
        $this->studentInterface = $studentDaoInterface;
    }

    /**
     * @return View student index
     */
    public function index()
    {
        $students = $this->studentInterface->getStudents();
        return view('student.index', compact('students'));
    }

    /**
     * @return View student create page
     */
    public function createStudent()
    {
        $majors = $this->studentInterface->getMajors();
        return view('student.create', compact('majors'));
    }

    /**
     * To check student and redirect back
     * @param StudentCreateRequest $request request form create major
     * @return View student index
     */
    public function storeStudent(StudentCreateRequest $request)
    {
        $this->studentInterface->storeStudent($request);
        return redirect()->route('student.index')->with(['success' => 'New student create successfully']);
    }

    /**
     * @param $id
     * @return View student edit page
     */
    public function editStudent($id)
    {
        $student = $this->studentInterface->getOneStudent($id);
        $majors = $this->studentInterface->getMajors();
        return view('student.edit', compact('student', 'majors'));
    }

    /**
     * To check student and redirect back
     * @param StudentUpdateRequest $request request form update student
     * @param $id
     * @return View student index
     */
    public function updateStudent(StudentUpdateRequest $request, $id)
    {
        $this->studentInterface->updateStudent($request, $id);
        return redirect()->route('student.index')->with(['success' => 'Student update successfully']);
    }

    /**
     * To delete student
     * @param Student $id
     * @return View student index
     */
    public function deleteStudent($id)
    {
        $this->studentInterface->deleteStudent($id);
        return redirect()->route('student.index')->with(['success' => 'Student delete successfully']);
    }
}
