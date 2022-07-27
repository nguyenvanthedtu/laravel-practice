<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->categories = new Category();
    }

    public function index()
    {
        $title =  'Category List';
        return view('admin.categories.index', compact( 'title'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categories->name = $request->name;
        $this->categories->save();
        return response()->json([
            'message' => 'Create category successfully!'
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        if ($category->save()) {
            return redirect(route('admin.categories.index'))->with('msg', 'Update category successfully');
        }

        return redirect(route('admin.categories.index'))->with('faild', 'Update category faild');
    }

    public function destroy($id)
    {
        if (!empty($id)) {
            $delete = Category::find($id)->delete(); 
                if($delete){
                    $msg = 'Delete category successfully';
                } else{
                    $msg =  'Delete category failed';
                }
        } else {
            $msg= 'Link does not exist';
        }
        return redirect(route('admin.categories.index'))->with('msg', $msg);
    }
}
