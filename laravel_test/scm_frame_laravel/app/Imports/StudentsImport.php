<?php

namespace App\Imports;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToCollection, WithHeadingRow, WithValidation
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $key => $row) {
            $major = Major::where('major_name', $row['major'])->first();

            if (isset($major)) {
                Student::create([
                    'student_name' => $row['student_name'],
                    'major_id'     => $major->id,
                    'age'          => $row['age'],
                    'phone'        => $row['phone_no'],
                ]);
            } else {
                return redirect()->back()->with(['error' => 'At Excel Row ' . ++$key . ' major column not found at database Major Table']);
            }

        }

        return redirect()->back()->with(['success' => 'Student data import successfully.']);
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
