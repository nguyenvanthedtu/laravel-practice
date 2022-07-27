<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users =  User::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $attibutes = $request->all();
        if ($this->user->create($attibutes)) {
            return response()->json([
                'message' => 'Created successfully!'
            ]);
        }

        return response()->json([
            'message' => 'Data created fail!'
        ]);
    }

    public function show($id)
    {
        return  $user = User::find($id);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $types = Type::all();
        return view('admin.users.edit', compact('user', 'types'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $attibutes = $request->all();
        if ($user->update($attibutes)) {
            return redirect(route('admin.users.index'))->with('msg', 'Update user successfully');
        }

        return redirect(route('admin.users.index'))->with('msg', 'Update user Faild');
    }

    public function destroy($id)
    {
        if (!empty($id)) {
            $delete = User::find($id)->delete();
            if ($delete) {
                $msg = 'Delete user successfully';
            }
        } else {
            $msg = 'Link does not exist';
        }
        return redirect(route('admin.users.index'))->with('msg', $msg);
    }
}
