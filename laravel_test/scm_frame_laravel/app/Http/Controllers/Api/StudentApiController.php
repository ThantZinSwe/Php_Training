<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StudentCreateRequest;
use App\Http\Requests\Student\StudentUpdateRequest;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    /**
     * $studentInterface
     */
    private $studentInterface;

    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        return $this->studentInterface = $studentServiceInterface;
    }

    /**
     * To show Majors data
     * @return View Api Major index
     */
    public function index()
    {
        $students = $this->studentInterface->index();
        return view('api.student.index', compact('students'));
    }

    /**
     * To get all majors
     * @return Object $major
     */
    public function create()
    {
        $majors = $this->studentInterface->create();
        return response()->json([
            'status' => 200,
            'majors' => $majors,
        ]);
    }

    /**
     * To check major and redirect back
     * @param Request $request request form create major
     * @return response json
     */
    public function store(StudentCreateRequest $request)
    {
        $this->studentInterface->store($request);
        return response()->json([
            'status'  => 200,
            'message' => 'Student created successfully',
        ]);
    }

    /**
     * To edit
     * @param $id
     * @return response json
     */
    public function edit($id)
    {
        $data = $this->studentInterface->edit($id);

        if ($data['student']['id']) {
            return response()->json([
                'status' => 200,
                'data'   => $data,
            ]);
        } else {
            return response()->json([
                'status'  => 404,
                'message' => 'Student not found',
            ]);
        }

    }

    /**
     * To update major
     * @param Request $request request from edit major
     * @param $id
     * @return response json
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        $student = $this->studentInterface->update($request, $id);

        if ($student) {
            return response()->json([
                'status'  => 200,
                'message' => 'Student updated successfully',
            ]);
        } else {
            return response()->json([
                'status'  => 404,
                'message' => 'Student not found',
            ]);
        }

    }

    /**
     * To delete major
     * @param $id
     * @return response json
     */
    public function delete($id)
    {
        $student = $this->studentInterface->delete($id);

        if ($student) {
            return response()->json([
                'status'  => 200,
                'message' => 'Student deleted successfully',
            ]);
        } else {
            return response()->json([
                'status'  => 404,
                'message' => 'Student not found',
            ]);
        }

    }

    public function pagination()
    {
        $students = $this->studentInterface->pagination();
        return view('api.student.pagination', compact('students'))->render();
    }

}
