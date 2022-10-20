<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name'  => 'required',
            'major' => 'required',
            'age'   => 'required',
            'phone' => 'required|min:11|regex:/(0)[0-9]{9}/',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validators->errors(),
            ]);
        }

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
    public function update(Request $request, $id)
    {
        $validators = Validator::make($request->all(), [
            'name'  => 'required',
            'major' => 'required',
            'age'   => 'required',
            'phone' => 'required|min:11|regex:/(0)[0-9]{9}/',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validators->errors(),
            ]);
        } else {
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
