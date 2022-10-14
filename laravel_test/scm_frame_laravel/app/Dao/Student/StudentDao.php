<?php

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentDao implements StudentDaoInterface
{

    /**
     * @return Object $students to get student
     */
    public function index()
    {
        $students = Student::with('major')->orderBy('id', 'desc')->get();
        return $students;
    }

    /**
     * To get all majors
     * @return Object $major
     */
    public function create()
    {
        $major = Major::get();
        return $major;
    }

    /**
     * To store student
     * @param Request $request request with inputs
     * @return Object $major to store student
     */
    public function store(Request $request)
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
     * To edit student
     * @param $id
     * @return Student $student
     * @return Major $majors
     */
    public function edit($id)
    {
        $student = Student::with('major')->findOrFail($id);
        $majors = Major::get();
        return compact('student', 'majors');
    }

    /**
     * To update student
     * @param Request $request request with inputs
     * @param $id
     * @return Object $major to store student
     */
    public function update(Request $request, $id)
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
    public function delete($id)
    {
        Student::findOrFail($id)->delete();
    }
}
