<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

interface StudentDaoInterface
{
    /**
     * To get all major
     * @return Object $students to get student
     */
    public function index();

    /**
     * To get all major
     * @return Object $major
     */
    public function create();

    /**
     * To store student
     * @param Request $request request with inputs
     * @return Object $major to store student
     */
    public function store(Request $request);

    /**
     * To edit student
     * @param $id
     * @return Student $student
     * @return Major $majors
     */
    public function edit($id);

    /**
     * To update student
     * @param Request $request request with inputs
     * @param $id
     * @return Object $major to store student
     */
    public function update(Request $request, $id);

    /**
     * To delete major
     * @param $id
     */
    public function delete($id);
}
