<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{

    public function __construct($students)
    {
        $this->students = $students;
    }

    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        return view('student.export', [
            'students' => $this->students,
        ]);
    }
}
