<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
    public function comment(Request $request,$id){
        $post = Post::where('id', $id)->firstOrFail();
        $this->comment->content = $request->content;
        $this->comment->user_id = auth()->user()->id;
        $this->comment->post_id = $post->id;
        $commentList = $post->latestComment;
        $count = count(Comment::where('id',$id)->get());
        $commentList->count = $count; 
        $this->comment->save($request->all());
        // if($this->comment->save($request->all())){
        //     // if($commentList->count() > 0){
        //     //     foreach ($commentList as $comment){
        //     //         return response()->json($comment);
                
        //     //         }
                
        //     //     }
        //         return back();
        // }
        return back();
            
    }
}
