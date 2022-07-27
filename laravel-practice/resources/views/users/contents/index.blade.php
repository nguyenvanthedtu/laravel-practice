@extends('users.layout.master')
@section('header')
    @parent
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to My Blog!</h1>
            </div>
        </div>
    </header>
@endsection
@section('content')
       <!-- Page content-->
       <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="{{ asset('uploads/posts/' . $post->image) }}" width="350px" height="175px"
                                        alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $post->created_at }}</div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{{ $post->content }}</p>
                                    <a class="btn btn-primary"
                                        href="{{route('post_detail', $post->id)}}">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
    
                        </div>
                    @endforeach
    
                </div>
                <!-- Pagination-->
                <div class="col-lg-8">
                    <div class="d-felx justify-content-center">
                        {!! $posts->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
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
            </div>
        </div>
    </div>
    <!-- Footer-->
   

@endsection