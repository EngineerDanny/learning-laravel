<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        //create a new user into the db
        //validate the fields in the request
        $fields = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|unique:users,email',
            'password' => 'string|required',
        ]);

        //access the validated fields to create the new user into the db

        $user = User::create([
            "name" => $fields["name"],
            "email" => $fields["email"],
            "password" => Hash::make($fields["password"]),
        ]);

        //create the jwt token
        $token = $user->createToken($fields["email"]);
        return response(['token' => $token->plainTextToken]);
    }

    public function login(Request $request)
    {
        //validate the fields
        $fields = $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required',
        ]);

        $isLoggedIn = Auth::attempt([
            'email' => $fields["email"],
            'password' => $fields["password"],
        ]);

        if (!$isLoggedIn) {
            return response(["message" => "Invalid email or password"], 400);
        }
        //create the jwt tokens
        $token = $request->user()->createToken($fields["email"]);
        return response(['token' => $token->plainTextToken]);
    }

    public function logout(Request $request)
    {
        //revoke all tokens created by this user
        $request->user()->tokens()->delete();
        return response(['message' => "success"], 200);

    }
}
