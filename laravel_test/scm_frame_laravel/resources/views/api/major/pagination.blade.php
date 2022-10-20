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

@section('script')
    <script>
        $(function($){

            // Create Major
            $(document).on('click','.create',function(e){
                e.preventDefault();

                var data = {
                    'name' : $('#name').val(),
                }

                $.ajax({
                    url: `/api/majors/store/`,
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function (res){
                        if(res.status == 400){
                            if(res.errors.name){
                                $('.createNameError').removeClass('d-none');
                                $('.createNameError').text(res.errors.name[0]);
                            }else{
                                $('.createNameError').addClass('d-none');
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
                })
            });

            // Edit Major
            $(document).on('click','.edit',function(e){
                e.preventDefault();
                var id = $(this).data('id');

                $.ajax({
                    url: `/api/majors/edit/${id}`,
                    method: 'GET',
                    dataType: "json",
                    success: function (res){
                        if(res.status == 404){
                            $('.successMessage').html("");
                            $('.successMessage').addClass('alert alert-danger');
                            $('.successMessage').text(res.message);
                        }

                        if(res.status == 200){
                            $('#updateName').val(res.major.major_name);
                            $('#updateID').val(res.major.id);
                        }
                    }
                });
            });

            // Update Major
            $(document).on('click','.update',function(e){
                e.preventDefault();
                var updateID = $('#updateID').val();
                var updateData = {
                    'name' : $('#updateName').val(),
                }

                $.ajax({
                    url: `/api/majors/edit/${updateID}`,
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
                    url: `/api/majors/delete/${deleteID}`,
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
                    url: `/api/majors/pagination/paginate-data?page=${page}`,
                    success: function(res){
                        $('.table-data').html(res);
                    }
                });
            }
        });
    </script>
@endsection
