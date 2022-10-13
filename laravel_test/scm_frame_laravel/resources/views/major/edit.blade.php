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
                <h5>Edit Major
                    <a href="{{route('major.index')}}" class="btn btn-danger float-end">Back</a>
                </h5>
            </div>
            <div class="card-body">
                <form action="{{route('major.update',$major->id)}}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="task" class="control-label">Major Name</label>

                        <div class="col-md-12 col-12">
                            <input type="text" name="name" class="form-control" value="{{old('name',$major->major_name)}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-6">
                            <button type="submit" class="btn btn-secondary">
                                 Update Major
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
