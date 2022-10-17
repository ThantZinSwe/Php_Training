@extends('layouts.main')
@section('style')
    {{-- <style>
        input[type="file"] {
            display: none;
        }
        .import-file {
            border: 1px solid #ccc;
            display: inline-block;
            border-radius: 5px;
            padding: 9px 12px;
            cursor: pointer;
            font-size: 15px;
        }
    </style> --}}
@endsection
@section('content')
<div class="row mt-5">
    <div class="col-8 col-md-8 offset-2">

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Nice! </strong>{{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry! </strong>{{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{route('student.import')}}" class="mb-4"  method="POST" enctype="multipart/form-data">
            @csrf
            <label for="file-upload" class="import-file">
                Import Excel File  <input id="file-upload" type="file" class="form-control form-control-sm" accept=".xlsx,.xls,.csv"  name="importFile"/>
           </label>
           <button type="submit" class="btn btn-secondary btn-sm">Import</button>
        </form>

        @if ($errors->any())
            <h5 class="text-danger">Excel Errors</h5>
            <ol>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ol>
        @endif

        <div class="card">
            <div class="card-header">
                <h5>Current Students
                    <a href="{{route('student.create')}}" class="btn btn-secondary float-end">Create Student</a>
                    <a href="{{route('student.exprot')}}" class="btn btn-success float-end me-2 ">Export</a>
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
