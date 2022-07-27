<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function store(LoginRequest $request){
        if (Auth::attempt([
            'email' => $request->input('email'), 'password' => $request->input('password'),
        ], $request->input('remember'))) {
            switch (auth()->user()->role) {

                case 1:
                    return response()->json([
                        'status' => true,
                        'redirect_location' => url('/'),
                        'role' => 1,
                        'msg' => 'Login Successfully',
                    ]);
                    break;
                case 2:
                    return response()->json([
                        'status' => true,
                        'redirect_location' => url('admin'),
                        'role' => 2,
                        'msg' => 'Login Successfully',
                    ]);
                    break;
            }
        }

        return response()->json(['status' => false, 'msg','Email or password is incorrect!']);
    }

    public function logout()
    {
        switch (auth()->user()->role) {
            case 1:
                auth()->logout();
                request()->session()->invalidate();
                return redirect(route('home'));
                break;
            case 2:
                auth()->logout();
                request()->session()->invalidate();
                return redirect(route('home'));
                break;
            default:
                break;
        }
    }
}
