@extends('admin.index')
@section('css')
    <link href="{{ asset('assets/admin/css/admin_user.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
@endsection
@section('content')
    <h1 class="h3 mb-1 text-gray-800"></h1>
    <div>
        <form action="{{ route('admin.posts.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="add-product">
                <div>
                    <table class="table cus_table">
                        <tr>
                            <td class="css_td">Title <span class="clred">*</span></td>
                            <td>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $post->title }}">
                                @error('title')
                                    <span class="message errors title_error">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="css_td">Old image</td>
                            <td>
                                <img src="{{ asset('uploads/posts/' . $post->image) }}" width="70px" height="70px"
                                    alt="">
                            </td>
                        </tr>
                        <tr>
                            <td class="css_td">New image</td>
                            <td>
                                <input type="file" id="image" name="image" class="form-control input_file"
                                    accept="image/*" value="{{ old('image') }}">
                                <div id="showImage"></div>
                                @error('image')
                                    <div class="alert alert-danger css_alter">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="css_td">Category <span class="clred">*</span></td>
                            <td>
                                <select id="category" name="category_id[]" class="form-control cus_select_category"
                                    multiple>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option value={{ $category->id }}
                                                {{ in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('category_id')
                                    <span class="message errors category_error">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                    
                        <tr>
                            <td class="css_td cus_css_td">Content <span class="clred">*</span></td>
                            <td>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
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
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
                <div>
                    <a href="" type="button" class="btn btn-primary">BACK</a>
                </div>
            </div>
        </form>
    </div>
@endsection
