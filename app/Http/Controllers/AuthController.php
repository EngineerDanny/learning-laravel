<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        //create a new user into the db

        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|max:50',
            'password' => 'required',
        ]);

        $user =  User::create([
            "name" => $fields["name"],
            "email" => $fields["email"],
            "password" => Hash::make($fields["password"]),
        ]);

        return  response($user, 200);

        //return the jwt token
    }

    public function login(Request $request)
    {
        //
    }
}
