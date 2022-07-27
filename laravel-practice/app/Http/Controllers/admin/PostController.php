<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $title = "Post List";
        $posts = Post::latest()->paginate(4);
        $user = User::with('posts')->where('id', '=', auth()->user()->id)->first();
        return view('admin.posts.index', compact('title', 'user', 'posts'));
    }

    public function create()
    {
        $categories  = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $attibutes = $request->all();
        $attibutes['user_id'] = auth()->user()->id;
        if ($request->hasFile('image')) {
            $filePath =  public_path('storage/images');
            $uploadPath = 'uploads/posts/';
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $attibutes['image'] = $fileName;
            $file->move($filePath, $fileName);
        }
        $post = $this->post->create($attibutes);
        $post->categories()->sync($request->category_id);
        if ($post) {
            return redirect(route('admin.posts.index'))->with('msg', 'Create post successfully');
        }

        return redirect(route('admin.posts.index'))->with('fail', 'Create post failed');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $attibutes = $request->except('image');
        if ($request->image) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $attibutes['image'] = $fileName;
            $file->move('uploads/posts/', $fileName);
        }
        $post->categories()->sync($request->category_id);
        $post->update($attibutes);

        return redirect(route('admin.posts.index'))->with('msg', 'Update post successfully');
    }
    
    public function destroy($id)
    {
        if (!empty($id)) {
            $deletePost = Post::find($id)->delete();
            if ($deletePost) {
                $msg = 'Delete post successfully';
            } 
        } else {
            $msg = 'Link does not exist';
        }
        return redirect(route('admin.posts.index'))->with('msg', $msg);
    }
}
