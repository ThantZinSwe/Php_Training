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
                    <button type="button" class="btn btn-warning text-white btn-sm ms-3 edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$major->id}}">Edit</a>
                    <button type="button" class="btn btn-danger text-white btn-sm ms-3 delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$major->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>
    {{$majors->links()}}
</div>
