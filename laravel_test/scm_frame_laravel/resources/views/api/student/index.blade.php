@extends('layouts.main')
@section('content')
<div class="row mt-5">
    <div class="col-10 col-md-10 offset-1">

        <div class="successMessage"></div>

        {{-- Card --}}
        <div class="card">
            <div class="card-header">
                <h5>Current Students
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary float-end create" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create Student
                    </button>
                </h5>
            </div>

            <div class="card-body table-data">
                {{-- Student Table --}}
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>No.</th>
                        <th>Student Name</th>
                        <th>Major</th>
                        <th>Age</th>
                        <th>Phone No</th>
                        {{-- <th>Date</th> --}}
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

                                <!-- Student start date -->
                                {{-- <td class="fw-bold fs-6">
                                    <div>{{ $student->created_at->format('Y-m-d') }}</div>
                                </td> --}}

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

                <!--Create Modal -->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel">Student Create</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="Student Name" class="col-form-label">Student Name:</label>
                                        <input type="text" class="form-control" id="name">
                                        <small class="text-danger d-none createNameError">something</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="Major" class="col-form-label">Major:</label>
                                        <select class="form-control" id="major">
                                        </select>
                                        <small class="text-danger d-none createMajorError">something</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="Age" class="col-form-label">Age:</label>
                                        <input type="number" class="form-control" id="age">
                                        <small class="text-danger d-none createAgeError">something</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="Phone" class="col-form-label">Phone:</label>
                                        <input type="text" class="form-control" id="phone">
                                        <small class="text-danger d-none createPhoneError">something</small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary store">Create</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Student Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <input type="hidden" id="updateID">
                                    <div class="mb-3">
                                        <label for="Student Name" class="col-form-label">Student Name:</label>
                                        <input type="text" class="form-control" id="updateName">
                                        <small class="text-danger d-none updateNameError">something</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="Major" class="col-form-label">Major:</label>
                                        <select class="form-control" id="updateMajor">
                                        </select>
                                        <small class="text-danger d-none updateMajorError">something</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="Age" class="col-form-label">Age:</label>
                                        <input type="number" class="form-control" id="updateAge">
                                        <small class="text-danger d-none updateAgeError">something</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="Phone" class="col-form-label">Phone:</label>
                                        <input type="text" class="form-control" id="updatePhone">
                                        <small class="text-danger d-none updatePhoneError">something</small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary update">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Student Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <span class="fw-bold">Are you sure to want to delete this major?</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger destroy">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(function($){
            // Create Student
            $(document).on('click','.create',function(e){
                e.preventDefault();

                $.ajax({
                    url: `/api/students/create`,
                    method: 'GET',
                    success: function(res){
                        $('#major').empty();
                        $('#major').append(`<option value="">Choose Major</option>`);
                        res.majors.forEach(function(major) {
                            $('#major').append(`<option value="${major.id}">${major.major_name}</option>`);
                        });
                    }
                });
            });

            // Store Student
            $(document).on('click','.store',function(e){
                e.preventDefault();
                var storeData = {
                    'name' : $('#name').val(),
                    'major' : $('#major').val(),
                    'age' : $('#age').val(),
                    'phone' : $('#phone').val(),
                }

                $.ajax({
                    url: `/api/students/create`,
                    method: 'POST',
                    data: storeData,
                    dataType: "json",
                    success: function(res){
                        if(res.status == 400){
                            if(res.errors.name){
                                $('.createNameError').removeClass('d-none');
                                $('.createNameError').text(res.errors.name[0]);
                            }else{
                                $('.createNameError').addClass('d-none');
                            }

                            if(res.errors.major){
                                $('.createMajorError').removeClass('d-none');
                                $('.createMajorError').text(res.errors.major[0]);
                            }else{
                                $('.createMajorError').addClass('d-none');
                            }

                            if(res.errors.age){
                                $('.createAgeError').removeClass('d-none');
                                $('.createAgeError').text(res.errors.age[0]);
                            }else{
                                $('.createAgeError').addClass('d-none');
                            }

                            if(res.errors.phone){
                                $('.createPhoneError').removeClass('d-none');
                                $('.createPhoneError').text(res.errors.phone[0]);
                            }else{
                                $('.createPhoneError').addClass('d-none');
                            }
                        }

                        if(res.status == 200){
                            $('.successMessage').html("");
                            $('.successMessage').addClass('alert alert-success');
                            $('.successMessage').text(res.message);
                            $('#createModal').modal('hide');
                            $('#createModal').find('input').val("");
                            $('.table').load(location.href+ ' .table');
                            pagination(1);
                        }
                    }
                });
            });

            // Edit Student
            $(document).on('click','.edit',function(e){
                e.preventDefault();
                var editID = $(this).data('id');

                $.ajax({
                    url: `/api/students/edit/${editID}`,
                    method: 'GET',
                    dataType: "json",
                    success: function(res){
                        if(res.status == 404){
                            $('.successMessage').html("");
                            $('.successMessage').addClass('alert alert-danger');
                            $('.successMessage').text(res.message);
                        }

                        if(res.status == 200){
                            $('#updateMajor').empty();
                            $('#updateMajor').append(`<option value="">Choose Major</option>`);
                            res.data.majors.forEach(function(major){
                                $('#updateMajor').append(`<option value="${major.id}" ${(res.data.student.major_id == major.id ? 'selected' : '')}>${major.major_name}</option>`);
                            });

                            $('#updateName').val(res.data.student.student_name);
                            $('#updateAge').val(res.data.student.age);
                            $('#updatePhone').val(res.data.student.phone);
                            $('#updateID').val(res.data.student.id);
                        }
                    }
                });
            });

            // Update Student
            $(document).on('click','.update',function(e){
                var updateID = $('#updateID').val();
                var updateData = {
                    'name' : $('#updateName').val(),
                    'major' : $('#updateMajor').val(),
                    'age' : $('#updateAge').val(),
                    'phone' : $('#updatePhone').val(),
                }

                $.ajax({
                    url: `/api/students/edit/${updateID}`,
                    method: 'PUT',
                    data: updateData,
                    dataType: "json",
                    success: function(res){
                        if(res.status == 400){
                            if(res.errors.name){
                                $('.updateNameError').removeClass('d-none');
                                $('.updateNameError').text(res.errors.name[0]);
                            }else{
                                $('.updateNameError').addClass('d-none');
                            }

                            if(res.errors.major){
                                $('.updateMajorError').removeClass('d-none');
                                $('.updateMajorError').text(res.errors.major[0]);
                            }else{
                                $('.updateMajorError').addClass('d-none');
                            }

                            if(res.errors.age){
                                $('.updateAgeError').removeClass('d-none');
                                $('.updateAgeError').text(res.errors.age[0]);
                            }else{
                                $('.updateAgeError').addClass('d-none');
                            }

                            if(res.errors.phone){
                                $('.updatePhoneError').removeClass('d-none');
                                $('.updatePhoneError').text(res.errors.phone[0]);
                            }else{
                                $('.updatePhoneError').addClass('d-none');
                            }
                        }else if(res.status == 404){
                            $('.successMessage').html("");
                            $('.successMessage').addClass('alert alert-danger');
                            $('.successMessage').text(res.message);
                        }else{
                            $('.successMessage').html("");
                            $('.successMessage').addClass('alert alert-success');
                            $('.successMessage').text(res.message);
                            $('#editModal').modal('hide');
                            $('#editModal').find('input').val("");
                            $('.table').load(location.href+ ' .table');
                            pagination(1);
                        }
                    }
                });
            });

            // Delete Major
            $(document).on('click','.destroy',function(e){
                e.preventDefault();

                var deleteID = $('.delete').data('id');
                $.ajax({
                    url: `/api/students/delete/${deleteID}`,
                    method: "DELETE",
                    dataType: "json",
                    success: function(res){
                        if(res.status == 404){
                            $('.successMessage').html("");
                            $('.successMessage').addClass('alert alert-danger');
                            $('.successMessage').text(res.message);
                        }else{
                            $('.successMessage').html("");
                            $('.successMessage').addClass('alert alert-success');
                            $('.successMessage').text(res.message);
                            $('#deleteModal').modal('hide');
                            $('.table').load(location.href+ ' .table');
                            pagination(1);
                        }
                    }
                });
            });

            // Paginator
            $(document).on('click','.pagination a',function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];

                pagination(page);
            })

            function pagination(page){
                $.ajax({
                    url: `/api/students/pagination/paginate-data?page=${page}`,
                    success: function(res){
                        $('.table-data').html(res);
                    }
                });
            }
        });
    </script>
@endsection
