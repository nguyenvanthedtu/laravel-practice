
@if (Auth::check())
<div class="post-comments" id="" >
    <header>
        <h3 class="h6">Post Comments<span class="no-of-comments">({{count($post->comments)}})</span></h3>
    </header>
    @foreach ($commentList as $comment )
    <div class="comment" id="comment-list">
        <div class="comment-header d-flex justify-content-between">
            <div class="user d-flex align-items-center">
                <div class="image"><img src="{{ asset('assets/clients/images/user.svg') }}"
                        alt="..." class="img-fluid rounded-circle" /></div>
                <div class="title">
                    <strong>
                        {{-- {{Auth::user()->user}} --}}
                        {{$comment->user->email}}
                     </strong>
                    <span class="date"> 
                        {{$comment->created_at->format('d-m-Y H:i:s')}}
                    </span>
                    </div>
            </div>
        </div>
        <div class="comment-body" id="list-comment">
            {{$comment->content}}
        </div>
    </div>
    @endforeach
    {{$commentList->links()}}
    <div class="alert alert-success success" role="alert" style="display: none">

    </div>
</div>
    <div class="add-comment">
        <header>
            <h3 class="h6">Leave a reply</h3>
        </header>
        <form action="" class="commenting-form" method="post" id="form-comment">
            @csrf
            <div class="row">
                
                <div class="form-group col-md-12">
                    <textarea placeholder="Type your comment" class="form-control" value="" name="content" id="content"></textarea>
                </div>
                <span class="message error comment_error"></span>
                    
       
                <div class="form-group col-md-12 mt-5">
                    <button type="submit" class="btn btn-secondary btn-submit ">Submit Comment</button>
                </div>
            </div>
        </form>
    </div>

@else
<div class="post-comments">
    <header>
        <h3 class="h6">Post Comments<span class="no-of-comments">({{count($post->comments)}})</span></h3>
    </header>
    @foreach ($commentList as $comment )
    <div class="comment">
        <div class="comment-header d-flex justify-content-between">
            <div class="user d-flex align-items-center">
                <div class="image"><img src="{{ asset('assets/clients/images/user.svg') }}"
                        alt="..." class="img-fluid rounded-circle" /></div>
                <div class="title">
                    <strong>
                        {{-- {{Auth::user()->user}} --}}
                        {{$comment->user->user}}
                     </strong>
                    <span class="date"> 
                        {{$comment->created_at->format('d-m-Y H:i:s')}}
                    </span>
                    </div>
            </div>
        </div>
        <div class="comment-body">
            {{$comment->content}}
        </div>
    </div>
    
    @endforeach
    
    {{$commentList->links()}}
   
        
</div>
@endif

