<?php

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Major;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentDao implements StudentDaoInterface
{

    /**
     * @return Object $students to get student
     */
    public function index()
    {
        $students = Student::with('major')->orderBy('id', 'desc')->paginate(5);
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
        $student = Student::with('major')->find($id);
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
        $student = Student::find($id);

        if ($student) {
            $student->student_name = $request->name;
            $student->major_id = $request->major;
            $student->age = $request->age;
            $student->phone = $request->phone;
            $student->save();
        }

        return $student;
    }

    /**
     * To delete major
     * @param $id
     */
    public function delete($id)
    {
        $student = Student::find($id);
        Student::findOrFail($id)->delete();
        return $student;
    }

    /**
     * To paginate major
     * @return $majors
     */
    public function pagination()
    {
        $students = Student::orderBy('id', 'desc')->paginate(5);
        return $students;
    }

    /**
     * To search data
     * @param Request $request input text and date
     * @return View Student index
     */
    public function search(Request $request)
    {
        $search = $request->search;

        $students = Student::select('students.*', 'majors.major_name')
            ->join('majors', 'majors.id', 'students.major_id');

        if (isset($request->search)) {
            $students->where(function ($q) use ($search) {
                $q->orWhereRaw("student_name like '%$search%'")
                    ->orWhereRaw("major_name like '%$search%'")
                    ->orWhereRaw("phone like '%$search%'")
                    ->orWhereRaw("age like '%$search%'");
            });

        }

        if (isset($request->startDate) || isset($request->endDate)) {
            $startDate = $request->startDate;
            $endDate = Carbon::parse($request->endDate)->addDays()->format('Y-m-d');

            $students->where(function ($q) use ($startDate, $endDate) {

                if (!is_null($startDate) && is_null($endDate)) {
                    $q->whereRaw("students.created_at >= '$startDate'");
                } elseif (is_null($startDate) && !is_null($endDate)) {
                    $q->whereRaw("students.created_at <= '$endDate'");
                } else {
                    $q->whereRaw("students.created_at <= '$endDate'")
                        ->whereRaw("students.created_at >= '$startDate'");
                }

            });

        }

        $students = $students->orderBy('id', 'desc')->paginate(5);

        $students->appends($request->all());
        return $students;
    }

}
