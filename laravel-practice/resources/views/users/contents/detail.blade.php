@extends('users.layout.master')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/clients/css/custom.css') }}">
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on {{$post->created_at->format('d-m-Y')}} by Start Bootstrap</div>
                    <!-- Post categories-->
                    @foreach ($post->categories as $category)
                    <a class="badge bg-secondary text-decoration-none link-light" href="{{route('category', $category->id)}}">{{$category->name }}</a>                        
                    @endforeach
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('uploads/posts/' . $post->image) }}" width="900px" height="350px"
                    alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{{$post->content}}</p>
                </section>
            </article>
            <!-- Comments section-->
                @include('users.contents.comments')

        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <form action="{{ route('search') }}" method="get">
             
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" name='search'/>
                            <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                        </div>
                    </div>
                </div>
                @csrf
        </form>
            <!-- Categories widget-->
            @include('users.contents.list-categories')
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @push('scripts')
<script>
   $(document).ready(function() {
        $('.btn-submit').click(function() {
                $("#form-comment").on('submit',function(event){
                 event.preventDefault();
                 var content = $('#content[name="content"]').val().trim();
                let url =  "{{route('post_comments', $post->id)}}";
                 var csrf_token = $(this).find('input[name="_token"]').val();
                  $.ajax({
                method: "POST",
                url: url,
                dataType: "json",
                data: {
                    content: content,
                    _token: csrf_token,
                },
                success: function(data){
                    console.log(data.content);
                
                },
                error: function(xhr, status, error){
                    console.log(error);
                    alert("something went wrong");
                }
            });
    });
        });
   });
</script>
@endpush --}}