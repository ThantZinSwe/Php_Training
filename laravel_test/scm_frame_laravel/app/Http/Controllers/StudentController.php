<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Requests\Student\StudentCreateRequest;
use App\Http\Requests\Student\StudentUpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * @return View student index
     */
    public function index()
    {
        $students = $this->studentInterface->index();
        return view('student.index', compact('students'));
    }

    /**
     * @return View student create page
     */
    public function create()
    {
        $majors = $this->studentInterface->create();
        return view('student.create', compact('majors'));
    }

    /**
     * To check student and redirect back
     * @param StudentCreateRequest $request request form create major
     * @return View student index
     */
    public function store(StudentCreateRequest $request)
    {
        $this->studentInterface->store($request);
        return redirect()->route('student.index')->with(['success' => 'New student create successfully']);
    }

    /**
     * @param $id
     * @return View student edit page
     */
    public function edit($id)
    {
        $data = $this->studentInterface->edit($id);
        return view('student.edit', $data);
    }

    /**
     * To check student and redirect back
     * @param StudentUpdateRequest $request request form update student
     * @param $id
     * @return View student index
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        $this->studentInterface->update($request, $id);
        return redirect()->route('student.index')->with(['success' => 'Student update successfully']);
    }

    /**
     * To delete student
     * @param Student $id
     * @return View student index
     */
    public function delete($id)
    {
        $this->studentInterface->delete($id);
        return redirect()->route('student.index')->with(['success' => 'Student delete successfully']);
    }

    /**
     * To export students data
     * To check students data and redirect back
     * @return Exprot excel file
     */
    public function export()
    {
        return $this->studentInterface->export();
    }

    /**
     * To import students data
     * To check students data and redirect back
     * @param Request $request input file
     */
    public function import(Request $request)
    {
        return $this->studentInterface->import($request);
    }

}
