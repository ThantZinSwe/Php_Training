<?php

namespace App\Imports;

use App\Models\Major;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'student_name' => $row['student_name'],
            'major_id'     => Major::where('major_name', $row['major'])->firstOrFail()->id,
            'age'          => $row['age'],
            'phone'        => $row['phone_no'],
        ]);
    }

    /**
     * To validate excel
     * @return back
     */
    public function rules(): array
    {
        return [
            'student_name' => 'required',
            'major'        => 'required',
            'age'          => 'required',
            'phone_no'     => 'required',
        ];
    }
}
