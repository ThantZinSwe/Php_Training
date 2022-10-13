<?php

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentDao implements StudentDaoInterface
{

    /**
     * To get all major
     * @return Object $students to get student
     */
    public function getStudents()
    {
        $students = Student::with('major')->orderBy('id', 'desc')->get();
        return $students;
    }

    public function getOneStudent($id)
    {
        $student = Student::with('major')->findOrFail($id);
        return $student;
    }

    /**
     * To get all major
     * @return Object $majors to get major
     */
    public function getMajors()
    {
        $majors = Major::get();
        return $majors;
    }

    /**
     * To store student
     * @param Request $request request with inputs
     * @return Object $major to store student
     */
    public function storeStudent(Request $request)
    {
        $student = new Student();
        $student->student_name = $request->name;
        $student->major_id = $request->major;
        $student->age = $request->age;
        $student->phone = $request->phone;
        $student->save();
        return $student;
    }

    /**
     * To update student
     * @param Request $request request with inputs
     * @param $id
     * @return Object $major to store student
     */
    public function updateStudent(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->student_name = $request->name;
        $student->major_id = $request->major;
        $student->age = $request->age;
        $student->phone = $request->phone;
        $student->save();
        return $student;
    }

    /**
     * To delete major
     * @param $id
     */
    public function deleteStudent($id)
    {
        Student::findOrFail($id)->delete();
    }
}
