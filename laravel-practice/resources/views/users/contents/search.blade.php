@extends('users.layout.master')

@section('content')
    <div class="row mt-4">

        <!-- Blog entries-->
        <div class="col-lg-8">
            <h3>Search Result: {{ $search }} </h3>
            <div class="row">
                @if ($posts->isNotEmpty())
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
                @else
                <div class="colg-lg-6">
                    No posts found
                </div>
                    
                @endif

            </div>

            <!-- Pagination-->
            <div class='d-flex justify-content-center'>
                {!! $posts->links() !!}
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
@endsection