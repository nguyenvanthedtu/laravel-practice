@extends('admin.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin_user.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
@endsection
@section('content')
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Admin Profile
                <button type="button" class="btn btn-primary add-data" data-toggle="modal">
                    Add Admin Profile
                </button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($users))
                            @foreach ($users as $key => $user)
                                <tr role="row" class="odd">
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="{{ asset('assets/clients/images/user.svg') }}" class="image">
                                    </td>
                                    <td>{{ $user->gender == '1' ? 'Male' : ($user->gender == '0' ? 'Female' : '') }}</td>
                                    <td>
                                        @if ($user->type->name == 'User')
                                            <div class="role role-user">
                                                {{ $user->type->name }}
                                            </div>
                                        @endif
                                        @if ($user->type->name == 'Admin')
                                            <div class="role role-admin">
                                                {{ $user->type->name }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                       
                                            @if($user->type->name == 'User')
                                            <a href="#" data-url="{{ route('admin.users.show', $user->id) }}"
                                                data-id="{{ $user->id }}" class="btn btn-warning btn-sm view-data"
                                                data-toggle="modal">View</a>
                                            <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                                class="btn btn-warning btn-sm edit-data ">Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete this item?')"
                                                href="{{ route('admin.users.delete', ['id' => $user->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Delete</a>
                                            
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No users</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                @include('admin.users.show')
                @include('admin.users.create')
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/admin/js/users/ajax.js') }}"></script>
@endsection
