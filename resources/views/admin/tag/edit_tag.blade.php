@extends('admin.master')
@section('title')
    edit tag
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Tag</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/all_tags')}}">Tags List</a></li>
                        <li class="breadcrumb-item">Edit Tag</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit Tag</h3>
                                <a href="{{ route('all_tags') }}" class="btn btn-primary">Go Back to Tags List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <form action="{{ route('update_tag',$tag->id) }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            @include('admin.includes.errors')
                                            <div class="form-group">
                                                <label for="name">Tag Name</label>
                                                <input type="name" name="name" value="{{$tag->name}}" class="form-control" id="name" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="description" id="description" rows="4" class="form-control"
                                                          placeholder="Enter description">{{$tag->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
