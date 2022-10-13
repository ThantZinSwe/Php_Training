<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

interface StudentDaoInterface
{
    /**
     * To get all major
     * @return Object $students to get student
     */
    public function getStudents();

    /**
     * To get one student
     * @return Object $student to get one student
     */
    public function getOneStudent($id);

    /**
     * To get all major
     * @return Object $majors to get major
     */
    public function getMajors();

    /**
     * To store student
     * @param Request $request request with inputs
     * @return Object $major to store student
     */
    public function storeStudent(Request $request);

    /**
     * To update student
     * @param Request $request request with inputs
     * @param $id
     * @return Object $major to store student
     */
    public function updateStudent(Request $request, $id);

    /**
     * To delete major
     * @param $id
     */
    public function deleteStudent($id);
}
