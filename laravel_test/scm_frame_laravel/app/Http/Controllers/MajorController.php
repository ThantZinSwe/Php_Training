<?php

namespace App\Http\Controllers;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Http\Requests\Major\MajorCreateRequest;
use App\Http\Requests\Major\MajorUpdateRequest;
use App\Models\Major;

class MajorController extends Controller
{
    /**
     * majorInterface
     */
    private $majorInterface;

    /**
     * Create new controller instance
     * @return void
     */
    public function __construct(MajorDaoInterface $majorDaoInterface)
    {
        $this->majorInterface = $majorDaoInterface;
    }

    /**
     * @return View major index
     * @return Object $majors to get all majors
     */
    public function index()
    {
        $majors = $this->majorInterface->getMajors();
        return view('major.index', compact('majors'));
    }

    /**
     * @return View major create page
     */
    public function createMajor()
    {
        return view('major.create');
    }

    /**
     * To check major and redirect back
     * @param MajorCreateRequest $request request form create major
     * @return View major index
     */
    public function storeMajor(MajorCreateRequest $request)
    {
        $this->majorInterface->storeMajor($request);
        return redirect()->route('major.index')->with(['success' => 'New Major create successfully']);
    }

    /**
     * @param $id
     * @return View major edit page
     */
    public function editMajor($id)
    {
        $major = $this->majorInterface->getOneMajor($id);
        return view('major.edit', compact('major'));
    }

    /**
     * To check major and redirect back
     * @param MajorUpdateRequest $request request form update major
     * @param $id
     * @return View major index
     */
    public function updateMajor(MajorUpdateRequest $request, $id)
    {
        $this->majorInterface->updateMajor($request, $id);
        return redirect()->route('major.index')->with(['success' => 'Major update successfully']);
    }

    /**
     * To delete major
     * @param Major $id
     * @return View major index
     */
    public function deleteMajor($id)
    {
        $this->majorInterface->deleteMajor($id);
        return redirect()->route('major.index')->with(['success' => 'Major delete successfully']);
    }
}
