@extends('layouts.main')
@section('content')
<div class="row mt-5">
    <div class="col-8 col-md-8 offset-2">

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Nice! </strong>{{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h5>Current Students
                    <a href="{{route('student.create')}}" class="btn btn-secondary float-end">Create Student</a>
                </h5>
            </div>

            <div class="card-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>No.</th>
                        <th>Student Name</th>
                        <th>Major</th>
                        <th>Age</th>
                        <th>Phone No</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($students as $key=>$student)
                            <tr>
                                <!-- No -->
                                <td class="fw-bold fs-6">
                                    <div>{{ ++$key }}</div>
                                </td>

                                <!-- Student Name -->
                                <td class="fw-bold fs-6">
                                    <div>{{ $student->student_name }}</div>
                                </td>

                                <!-- Student Mjaor -->
                                <td class="fw-bold fs-6">
                                    <div>{{ $student->major->major_name }}</div>
                                </td>

                                <!-- Student age -->
                                <td class="fw-bold fs-6">
                                    <div>{{ $student->age }}</div>
                                </td>

                                <!-- Student phone -->
                                <td class="fw-bold fs-6">
                                    <div>{{ $student->phone }}</div>
                                </td>

                                <td>
                                    <div>
                                        <a href="{{route('student.edit',$student->id)}}" class="btn btn-warning text-white btn-sm">Edit</a>
                                        <form action="{{route('student.delete',$student->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to want to delete this student?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
