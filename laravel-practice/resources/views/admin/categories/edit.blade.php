@extends('admin.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom_table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
@endsection
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit category</h1>
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <form method="POST" action="{{ route('admin.categories.update', ['id' => $category->id]) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Id</label>
                        <input type="text" class="form-control" name="id" value="{{ $category->id }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
                        @error('name')
                            <span class="message errors username_error">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label>Status</label>
                        <select class="form-select form-control" aria-label="Default select example" id="status"
                            name="status">
                            <option value="1" {{ $category->status == '1' ? 'selected' : '' }}>Open</option>
                            <option value="0" {{ $category->status == '0' ? 'selected' : '' }}>Lock</option>
                        </select>
                        @error('status')
                        <span class="message errors username_error">{{ $message }}</span>
                    @enderror
                    </div> --}}
                    <a href="{{ route('admin.categories.index') }}">
                        <button type="button" class="btn btn-primary" style="margin-right: 20px">Back</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
