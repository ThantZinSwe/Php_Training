<?php

namespace App\Dao\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorDao implements MajorDaoInterface
{

    /**
     * To get all major
     * @return Object $majors to get major
     */
    public function index()
    {
        $majors = Major::orderBy('id', 'desc')->paginate(5);
        return $majors;
    }

    /**
     * To store major
     * @param Request $request request with inputs
     * @return Object $major to store major
     */
    public function store(Request $request)
    {
        $major = new Major();
        $major->major_name = $request->name;
        $major->save();
        return $major;
    }

    /**
     * To edit student
     * @param $id
     * @return Major $major
     */
    public function edit($id)
    {
        $major = Major::find($id);
        return $major;
    }

    /**
     * To update major
     * @param Request $request with inputs
     * @param $id
     * @return Object $major to update major
     */
    public function update(Request $request, $id)
    {
        $major = Major::find($id);
        $major->major_name = $request->name;
        $major->save();
        return $major;
    }

    /**
     * To delete major
     * @param $id
     */
    public function delete($id)
    {
        Major::findOrFail($id)->delete();
    }

    /**
     * To paginate major
     * @return $majors
     */
    public function pagination()
    {
        $majors = Major::orderBy('id', 'desc')->paginate(5);
        return $majors;
    }

}
