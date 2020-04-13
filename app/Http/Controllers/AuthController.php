<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    protected  function  generateAccessToken($user)
    {
        $token = $user->createToken($user->email.'-'.now());

        return $token->accessToken;
    }

    public function register(Request $request)
    {
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json($user);

    }
}
