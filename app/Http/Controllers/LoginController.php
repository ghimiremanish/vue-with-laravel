<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function index(Request $request){

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt(['email'=> $request->username, 'password' => $request->password])) {
            // Authentication passed...
            $user = Auth::guard('admin')->user();
            $accessToken = Auth::guard('admin')->user()->createToken('authToken')->accessToken;
            return response()->json([$accessToken, $user,'kind' => 'admin'],200);
        }elseif(Auth::guard('user')->attempt(['username'=> $request->username, 'password' => $request->password])){
            //for users
            $user = Auth::guard('user')->user();
            $accessToken = Auth::guard('user')->user()->createToken('authToken')->accessToken;
            return response()->json([$accessToken, $user,'kind' => 'user'],200);
        }else{
            return response()->json(['error' => 'Failed to logged in!'],401);
        }
        
    }


}
