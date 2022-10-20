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
                <h5>Current Majors
                    <a href="{{route('major.create')}}" class="btn btn-secondary float-end">Create Major</a>
                </h5>
            </div>

            <div class="card-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>No.</th>
                        <th>Major</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($majors as $key=>$major)
                            <tr>
                                <!-- Major ID -->
                                <td class="fw-bold fs-6">
                                    <div>{{ ++$key }}</div>
                                </td>

                                <!-- Major ID -->
                                <td class="fw-bold fs-6">
                                    <div>{{ $major->major_name }}</div>
                                </td>

                                <td>
                                    <div>
                                        <a href="{{route('major.edit',$major->id)}}" class="btn btn-warning text-white btn-sm">Edit</a>
                                        <form action="{{route('major.delete',$major->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to want to delete this major?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$majors->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
