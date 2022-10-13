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
    public function getMajors()
    {
        $majors = Major::orderBy('id', 'desc')->get();
        return $majors;
    }

    public function getOneMajor($id)
    {
        $major = Major::findOrFail($id);
        return $major;
    }

    /**
     * To store major
     * @param Request $request request with inputs
     * @return Object $major to store major
     */
    public function storeMajor(Request $request)
    {
        $major = new Major();
        $major->major_name = $request->name;
        $major->save();
        return $major;
    }

    /**
     * To update major
     * @param Request $request with inputs
     * @param $id
     * @return Object $major to update major
     */
    public function updateMajor(Request $request, $id)
    {
        $major = Major::findOrFail($id);
        $major->major_name = $request->name;
        $major->save();
        return $major;
    }

    /**
     * To delete major
     * @param $id
     */
    public function deleteMajor($id)
    {
        Major::findOrFail($id)->delete();
    }
}
