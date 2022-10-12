@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Laravel Test</h1>
        <!-- New Task Form -->
        <div class="row mt-5">
            <div class="col-8 col-md-8 offset-2">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <div class="card">
                    <div class="card-header">
                        <h5>New Task</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('task.create')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="task" class="control-label">Task</label>

                                <div class="col-md-12 col-12">
                                    <input type="text" name="name" id="task-name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <div class="col-md-6 col-6">
                                    <button type="submit" class="btn btn-primary">
                                         Add Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Tasks -->
        <div class="row mt-5">
            <div class="col-8 col-md-8 offset-2">

                <div class="card">
                    <div class="card-header">
                        <h5>Current Task</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="fw-bold fs-6">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <td>
                                            <form action="{{route('task.delete',$task->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to want to delete this task?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
