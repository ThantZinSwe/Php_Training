<?php

namespace App\Contracts\Dao\Major;

use Illuminate\Http\Request;

interface MajorDaoInterface
{

    /**
     * To get all major
     * @return Object $majors to get major
     */
    public function index();

    /**
     * To store major
     * @param Request $request request with inputs
     * @return Object $major to store major
     */
    public function store(Request $request);

    /**
     * To edit student
     * @param $id
     * @return Major $major
     */
    public function edit($id);

    /**
     * To update major
     * @param Request $request with inputs
     * @param $id
     * @return Object $major to update major
     */
    public function update(Request $request, $id);

    /**
     * To delete major
     * @param $id
     */
    public function delete($id);

    /**
     * To paginate major
     * @return $majors
     */
    public function pagination();
}
