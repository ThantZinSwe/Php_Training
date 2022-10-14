@extends('layouts.main')
@section('style')
    <style>
        .form-group{
            margin-bottom: 20px;
        }
    </style>
@endsection
@section('content')
<div class="row mt-5">
    <div class="col-8 col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h5>New Student
                    <a href="{{route('student.index')}}" class="btn btn-danger float-end">Back</a>
                </h5>
            </div>
            <div class="card-body">
                <form action="{{route('student.store')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="task" class="control-label">Student Name</label>

                        <div class="col-md-12 col-12">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task" class="control-label">Major</label>

                        <div class="col-md-12 col-12">
                            <select name="major" class="form-select" aria-label="Default select example">
                                <option value="">Select Major</option>
                                @foreach ($majors as $major)
                                    <option value="{{$major->id}}" {{old('major') == $major->id ? 'selected' : ''}}>{{$major->major_name}}</option>
                                @endforeach
                            </select>
                            @error('major')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="age" class="control-label">Age</label>

                        <div class="col-md-12 col-12">
                            <input type="number" name="age" class="form-control" value="{{old('age')}}">
                            @error('age')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="control-label">Phone No</label>

                        <div class="col-md-12 col-12">
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-6">
                            <button type="submit" class="btn btn-secondary">
                                 Add Student
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
