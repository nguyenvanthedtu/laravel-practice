@extends('admin.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom_table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
@endsection
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit user</h1>
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <form method="POST" action="{{route('admin.users.update',$user->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label> FullName </label>
                        <input type="text" id="username" name="fullname" class="form-control" value="{{$user->fullname }}">
                        @error ('username')
                        <span class="message errors username_error">{{$message}}</span>
                        @enderror
                        

                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input type="text" id="email" name="email" class="form-control" value="{{$user->email}}" readonly>
                        @error('email')
                        <span class="message errors email_error">{{$message}}</span>
                        @enderror

                    </div>
                  
                    <div class="mb-3">
                        <div>
                            <label class="radio-container">Male
                                <input type="radio" value="1"{{old('gender')}} name="gender" checked id="gender-add">
                            </label>
                            <label class="radio-container">Female
                                <input type="radio" name="gender" value="0"{{old('gender')}} id="gender-add">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <select id="role" name="role" class="form-control cus_select_role">
                            <option selected disabled>Choose role</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $user->role == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <a href="{{ route('admin.users.index') }}">
                        <button type="button" class="btn btn-primary" style="margin-right: 20px">Back</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
