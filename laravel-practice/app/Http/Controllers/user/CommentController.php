<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use COM;
use Illuminate\Http\Request;
use Spatie\Backtrace\Backtrace;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->comment = new Comment();
    }
    
    public function comment(CommentRequest $request){
        $post = Post::where('id',$request->id)->first();
        $attibutes['content'] = $request->content;
        $attibutes['user_id'] = auth()->user()->id;
        $attibutes['post_id'] = $post->id;
        $post->latestComments;
        $this->comment->create($attibutes);
        return back();
    }
}
