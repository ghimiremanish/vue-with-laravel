<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function logout(){
        $token = $request->token;
        $auth = Auth::guard('admin')->token();
        $auth->revoke();
        return response()->json(['success'], 200);
    }
    
}
