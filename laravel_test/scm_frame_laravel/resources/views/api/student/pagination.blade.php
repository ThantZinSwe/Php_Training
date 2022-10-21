{{-- Student Table --}}
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
                    <button type="button" class="btn btn-warning text-white btn-sm ms-3 edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$student->id}}">Edit</a>
                    <button type="button" class="btn btn-danger text-white btn-sm ms-3 delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$student->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{$students->links()}}
</div>
