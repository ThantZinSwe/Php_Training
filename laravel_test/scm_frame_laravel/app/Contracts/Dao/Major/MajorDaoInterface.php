<?php

namespace App\Contracts\Dao\Major;

use Illuminate\Http\Request;

interface MajorDaoInterface
{

    /**
     * To get all major
     * @return Object $majors to get major
     */
    public function getMajors();

    /**
     * To get one major
     * @param $id
     * @return Object $major to get one major
     */
    public function getOneMajor($id);

    /**
     * To store major
     * @param Request $request request with inputs
     * @return Object $major to store major
     */
    public function storeMajor(Request $request);

    /**
     * To update major
     * @param Request $request with inputs
     * @param $id
     * @return Object $major to update major
     */
    public function updateMajor(Request $request, $id);

    /**
     * To delete major
     * @param $id
     */
    public function deleteMajor($id);
}
