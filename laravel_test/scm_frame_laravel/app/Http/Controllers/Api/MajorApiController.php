<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Major\MajorServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MajorApiController extends Controller
{

    /**
     * $majorInterface
     */
    private $majorInterface;

    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        return $this->majorInterface = $majorServiceInterface;
    }

    /**
     * To show Majors data
     * @return View Api Major index
     */
    public function index()
    {
        $majors = $this->majorInterface->index();
        return view('api.major.index', compact('majors'));
    }

    /**
     * To check major and redirect back
     * @param Request $request request form create major
     * @return response json
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validators->errors(),
            ]);
        }

        $this->majorInterface->store($request);
        return response()->json([
            'status'  => 200,
            'message' => 'Major created successfully',
        ]);
    }

    /**
     * To edit
     * @param $id
     * @return response json
     */
    public function edit($id)
    {
        $major = $this->majorInterface->edit($id);

        if ($major) {
            return response()->json([
                'status' => 200,
                'major'  => $major,
            ]);
        } else {
            return response()->json([
                'status'  => 404,
                'message' => 'Major not found',
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
            'name' => 'required',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validators->errors(),
            ]);
        } else {
            $major = $this->majorInterface->update($request, $id);

            if ($major) {
                return response()->json([
                    'status'  => 200,
                    'message' => 'Major updated successfully',
                ]);
            } else {
                return response()->json([
                    'status'  => 404,
                    'message' => 'Major not found',
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
        $major = Major::find($id);

        if ($major) {
            $this->majorInterface->delete($id);
            return response()->json([
                'status'  => 200,
                'message' => 'Major deleted successfully',
            ]);
        } else {
            return response()->json([
                'status'  => 404,
                'message' => 'Major not found',
            ]);
        }

    }

    public function pagination()
    {
        $majors = $this->majorInterface->pagination();
        return view('api.major.pagination', compact('majors'));
    }

}
