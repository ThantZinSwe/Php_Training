<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Major\MajorServiceInterface;
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
    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorInterface = $majorServiceInterface;
    }

    /**
     * @return View major index
     * @return Object $majors to get all majors
     */
    public function index()
    {
        $majors = $this->majorInterface->index();
        return view('major.index', compact('majors'));
    }

    /**
     * @return View major create page
     */
    public function create()
    {
        return view('major.create');
    }

    /**
     * To check major and redirect back
     * @param MajorCreateRequest $request request form create major
     * @return View major index
     */
    public function store(MajorCreateRequest $request)
    {
        $this->majorInterface->store($request);
        return redirect()->route('major.index')->with(['success' => 'New Major create successfully']);
    }

    /**
     * @param $id
     * @return View major edit page
     */
    public function edit($id)
    {
        $major = $this->majorInterface->edit($id);
        return view('major.edit', compact('major'));
    }

    /**
     * To check major and redirect back
     * @param MajorUpdateRequest $request request form update major
     * @param $id
     * @return View major index
     */
    public function update(MajorUpdateRequest $request, $id)
    {
        $this->majorInterface->update($request, $id);
        return redirect()->route('major.index')->with(['success' => 'Major update successfully']);
    }

    /**
     * To delete major
     * @param Major $id
     * @return View major index
     */
    public function delete($id)
    {
        $this->majorInterface->delete($id);
        return redirect()->route('major.index')->with(['success' => 'Major delete successfully']);
    }
}
