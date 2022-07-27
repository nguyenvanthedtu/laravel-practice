<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   
    public function __construct()
    {
        $this->user= new User();
    }

    public function postRegister(RegisterRequest $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $this->user ->create($data);
        return  response()->json([
            'success' => true,
            'redirect_location' => url('/'),
            'msg'   => 'Register Successfully',    
        ]);

    }
}
