<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\LoginController;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function authenticated(Request $request, $user){
        return response()->json($user);
    }

    public function loggedOut(Request $request){
        return response()->json(null);
    }
}

