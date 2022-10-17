<table class="table table-striped task-table">

    <!-- Table Headings -->
    <thead>
        <tr>
            <th>No.</th>
            <th>Student Name</th>
            <th>Major</th>
            <th>Age</th>
            <th>Phone No</th>
        </tr>
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
            </tr>
        @endforeach
    </tbody>
</table>
