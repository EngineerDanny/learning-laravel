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
        //validate the fields in the request
        $fields = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|unique:users,email',
            'password' => 'string|required',
        ]);

        //access the validated fields to create the new user into the db
        $user =  User::create([
            "name" => $fields["name"],
            "email" => $fields["email"],
            "password" => Hash::make($fields["password"]),
        ]);

        return response($user, 200);

        //return the jwt token
    }

    public function login(Request $request)
    {
        //
    }
}
