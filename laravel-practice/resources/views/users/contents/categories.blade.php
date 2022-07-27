@extends('users.layout.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <!-- Nested row for non-featured blog posts-->
            <h3>Category: 
               {{$category->name}}
            </h3>
            <hr>
            <div class="row">
                @foreach ($postList as $post)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{asset('uploads/posts/'. $post->image)}}" width="350px" height="175px" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{$post->created_at}}</div>
                            <h2 class="card-title h4">{{$post->title}}</h2>
                            <p class="card-text">{{$post->content}}</p>
                            <a class="btn btn-primary"
                            href="{{route('post_detail', $post->id)}}">Read more →</a>

                        </div>
                    </div>
                    
                </div>
                    
                @endforeach
          
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    {{$postList->links()}}
                </ul>
            </nav>
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
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="{{route('category', $category->id)}}">{{ $category->name }}</a></li>
                                </ul>
                            </div>
                        @endforeach
            
                    </div>
                </div>
            </div>
            <!-- Side widget-->
        </div>
    </div>
</div>
@endsection