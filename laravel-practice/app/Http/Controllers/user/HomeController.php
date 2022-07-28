<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){
        $posts = Post::latest()->paginate(4);
        return view('users.contents.index', compact('posts'));
    }

    public function show($id){
        $category = Category::find($id);
        $postList = $category->latestPosts()->paginate(4);
        return view('users.contents.categories', compact('postList','category'));
    }

    public function detail($id){
        $post = Post::find($id);
        $commentList = $post->latestComments()->simplePaginate(4);
        return view('users.contents.detail',compact('post','commentList'));
    }
    
    public function search(Request $request){
        $search = $request->input('search');
        $posts = Post::latest()->where('title','LIKE', "%{$search}")
        ->orWhere('content', 'LIKE', "%{$search}")->paginate(4);
        return view('users.contents.search', compact('search','posts'));
    }
}
