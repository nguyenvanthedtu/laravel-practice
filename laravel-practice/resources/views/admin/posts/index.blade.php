@extends('admin.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom_table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
@endsection
@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    @if (Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger" role="alert">
            {{ session('fail') }}
        </div>
    @endif
    <div class="alert alert-success success" role="alert" style="display: none">
    </div>
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">

                    <a type="submit" class="btn btn-primary" href="{{route('admin.posts.add')}}">
                        Add Posts
                    </a>
                </h6>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable123" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Author</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        
                      
                        @if ($posts -> count() > 0)
                        <?php
                        $i = ($posts->currentpage()-1)*$posts->perpage()+1;
                         ?>
                        @foreach ($posts as  $post)
                            <tr>
                                <td> {{ $i ++}}</td>
                                <td>
                                    <img src="{{asset('storage/images/'.$post->image )}}" width="70px" height="70px" alt="">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @foreach ($post->categories as $value )
                                    {{$value->name}}</br>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($user->type->name == 'User')
                                        <div class="role role-user">
                                            {{ $user->type->name }}
                                        </div>
                                    @endif
                                    @if ($user->type->name == 'Admin')
                                    <div class="role role-user" style="width:45%; line-height:20px">
                                        {{ $user->type->name }}
                                    </div>
                                    @endif
                                </td>
                           
                                <td>
                                    <div class="tools">
                                        <div class="mr-10">
                                           
                                        </div>
                                        <a href="{{route('admin.posts.edit', ['id'=> $post->id])}}" class="btn btn-warning btn-sm edit-data "
                                            >Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete this item?')"
                                            href="{{route('admin.posts.delete', ['id' => $post->id])}}"
                                            class="btn btn-danger btn-sm btn-delete">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">No posts</td>
                        </tr>   
                        @endif
                    </tbody>
                </table>
                <div class='d-flex justify-content-end'>
                    {{$posts ->links()}}

                </div>
              
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content cus-modal-details">
                <h3 class="title-order">Post details</h3>
                <div class="modal-header">
                    <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body">
                    <table class="details"></table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

