<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentService implements StudentServiceInterface
{

    /**
     * $studentDao
     */
    private $studentDao;

    /**
     * Class Constructor
     * @param StudentDaoInterface
     */
    public function __construct(StudentDaoInterface $studentDaoInterface)
    {
        $this->studentDao = $studentDaoInterface;
    }

    /**
     * To get all major
     * @return Object $students to get student
     */
    public function index()
    {
        return $this->studentDao->index();
    }

    /**
     * To get all major
     * @return Object $major
     */
    public function create()
    {
        return $this->studentDao->create();
    }

    /**
     * To store student
     * @param Request $request request with inputs
     * @return Object $major to store student
     */
    public function store(Request $request)
    {
        return $this->studentDao->store($request);
    }

    /**
     * To edit student
     * @param $id
     * @return Student $student
     * @return Major $majors
     */
    public function edit($id)
    {
        return $this->studentDao->edit($id);
    }

    /**
     * To update student
     * @param Request $request request with inputs
     * @param $id
     * @return Object $major to store student
     */
    public function update(Request $request, $id)
    {
        return $this->studentDao->update($request, $id);
    }

    /**
     * To delete major
     * @param $id
     */
    public function delete($id)
    {
        return $this->studentDao->delete($id);
    }

    /**
     * To paginate student
     * @return $students
     */
    public function pagination()
    {
        return $this->studentDao->pagination();
    }

    /**
     * To search data
     * @param Request $request input text and date
     * @return View Student index
     */
    public function search(Request $request)
    {
        return $this->studentDao->search($request);
    }

    /**
     * To export students data
     * To check students data and redirect back
     * @return Exprot excel file
     */
    public function export()
    {
        $students = Student::all();
        $count = Student::count();

        if ($count > 0) {
            return Excel::download(new StudentsExport($students), 'students.xlsx');
        } else {
            return redirect()->back()->with(['error' => 'No students data.']);
        }

    }

    /**
     * To import students data
     * To check students data and redirect back
     * @param Request $request input file
     */
    public function import(Request $request)
    {

        if (isset($request->importFile)) {
            Excel::import(new StudentsImport, $request->file('importFile'));
            return redirect()->back();
        } else {
            return redirect()->back()->with(['error' => 'Please fill import file.']);
        }

    }

}
