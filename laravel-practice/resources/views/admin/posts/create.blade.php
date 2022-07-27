@extends('admin.index')
@section('css')
    <link href="{{ asset('assets/admin/css/admin_user.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
@endsection
@section('content')
    <h1 class="h3 mb-1 text-gray-800"></h1>
    <div>
        <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="add-product">
                <div>
                    <table class="table cus_table">
                        <tr>
                            <td class="css_td">Title <span class="clred">*</span></td>
                            <td>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                <span class="message errors title_error">{{ $message }}</span>
                            @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="css_td">Image <span class="clred">*</span></td>
                            <td>
                                <input type="file" id="image" name="image" class="form-control input_file" accept="image/*"
                                    value="{{ old('image') }}">
                                <div id="showImage"></div>
                                @error('image')
                                <span class="message errors image_error">{{ $message }}</span>
                            @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="css_td">Category <span class="clred">*</span></td>
                            <td>
                                <select id="category" name="category_id[]" class="form-control cus_select_category" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                            <span class="message errors category_error">{{ $message }}</span>
                        @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="css_td cus_css_td">Content <span class="clred">*</span></td>
                            <td>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                                @error('content')
                                <span class="message errors content_error">{{ $message }}</span>
                            @enderror
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="group_button">
                <div class="btn_create">
                    <button type="submit" class="btn btn-primary">CREATE</button>
                </div>
                <div>
                    <a href="" type="button" class="btn btn-primary">BACK</a>
                </div>
            </div>
        </form>
    </div>
@endsection
