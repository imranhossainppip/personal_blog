@extends('admin.master')
@section('title')
    All post
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">post List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item">post</li>
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
                        <div class="card-body">
                            <h5 class="card-title">post List</h5>
                            <a href="{{route('add_post')}}" class="btn btn-info float-right">Create Post</a>
                        </div>
                        <div>
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($posts->count() > 0)
                                          @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td><img src="{{url($post->image)}}" width="50" height="50"></td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->category->name}}</td>
                                            <td>{{$post->user->name}}</td>
                                            <td class="d-flex">
                                            <a class="btn btn-info btn-sm mr-1" href="">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-success btn-sm mr-1" href="{{route('edit_post' ,$post->id)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm mr-1" id="delete" href="{{route('delete_post' ,$post->id)}}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            </td>
                                        </tr>
                                          @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7">
                                                    <h5 style="text-align: center;color: red">No Post Found Here</h5>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
